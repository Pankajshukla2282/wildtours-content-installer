<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Seeds the wildtours-plugin operational tables (customers, vendors,
 * vendor_rates, settlements, sell rates, availability, bookings with
 * items/travelers/payments) from 12-OPERATIONS-DATA.json.
 *
 * Mirrors the plugin repositories' insert shape (see PWT\Core\Database\Schema)
 * and is idempotent: every entity is deduped on its natural key before insert,
 * so repeated runs never create duplicate rows.
 *
 * Runs AFTER SeedImporter so CPT references (safari schedules, room units,
 * vehicles, restaurants) can be resolved by title.
 */
final class DatabaseSeeder
{
    /**
     * @var array<int, array<string, mixed>>
     */
    private array $log = [];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function import(): array
    {
        $file = PWTCI_CONTENT_DIR . '12-OPERATIONS-DATA.json';

        if (!is_readable($file)) {
            return [];
        }

        $data = json_decode((string) file_get_contents($file), true);

        if (!is_array($data)) {
            return [];
        }

        $this->insertCustomers((array) ($data['customers'] ?? []));
        $this->insertVendors((array) ($data['vendors'] ?? []));
        $this->insertVendorRates((array) ($data['vendor_rates'] ?? []));
        $this->insertSellRates((array) ($data['rates'] ?? []));
        $this->insertAvailability((array) ($data['availability'] ?? []));
        $this->insertBookings((array) ($data['bookings'] ?? []));
        $this->insertSettlements((array) ($data['settlements'] ?? []));

        return $this->log;
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertCustomers(array $rows): void
    {
        foreach ($rows as $row) {
            $email = sanitize_email((string) ($row['email'] ?? ''));

            if ($email === '') {
                continue;
            }

            if ($this->exists('customers', 'email=%s', [$email])) {
                $this->log('customer', 'existing', $email);
                continue;
            }

            $this->db()->insert($this->table('customers'), [
                'email'      => $email,
                'phone'      => $this->text($row['phone'] ?? null),
                'first_name' => sanitize_text_field((string) ($row['first_name'] ?? '')),
                'last_name'  => $this->text($row['last_name'] ?? null),
                'country'    => $this->text($row['country'] ?? null),
                'city'       => $this->text($row['city'] ?? null),
                'notes'      => $this->textarea($row['notes'] ?? null),
                'created_at' => current_time('mysql'),
                'updated_at' => current_time('mysql'),
            ]);

            $this->log('customer', 'created', $email);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertVendors(array $rows): void
    {
        foreach ($rows as $row) {
            $name = sanitize_text_field((string) ($row['name'] ?? ''));

            if ($name === '') {
                continue;
            }

            if ($this->exists('vendors', 'name=%s', [$name])) {
                $this->log('vendor', 'existing', $name);
                continue;
            }

            $this->db()->insert($this->table('vendors'), [
                'name'           => $name,
                'vendor_type'    => sanitize_key((string) ($row['vendor_type'] ?? 'other')),
                'contact_person' => $this->text($row['contact_person'] ?? null),
                'email'          => $row['email'] ?? null ? sanitize_email((string) $row['email']) : null,
                'phone'          => $this->text($row['phone'] ?? null),
                'pan'            => $this->text($row['pan'] ?? null),
                'gstin'          => $this->text($row['gstin'] ?? null),
                'bank_details'   => $this->textarea($row['bank_details'] ?? null),
                'notes'          => $this->textarea($row['notes'] ?? null),
                'status'         => sanitize_key((string) ($row['status'] ?? 'active')),
                'created_at'     => current_time('mysql'),
                'updated_at'     => current_time('mysql'),
            ]);

            $this->log('vendor', 'created', $name);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertVendorRates(array $rows): void
    {
        foreach ($rows as $row) {
            $vendorId = $this->idBy('vendors', 'name=%s', [sanitize_text_field((string) ($row['vendor'] ?? ''))]);

            if ($vendorId <= 0) {
                continue;
            }

            $resourceType = sanitize_key((string) ($row['resource_type'] ?? 'service'));
            $resourceId = $this->resolveResource($row['resource'] ?? $row['resource_id'] ?? 0);
            $unitPrice = (float) ($row['unit_price'] ?? 0);

            if ($this->exists(
                'vendor_rates',
                'vendor_id=%d AND resource_type=%s AND resource_id=%d AND unit_price=%f',
                [$vendorId, $resourceType, $resourceId, $unitPrice]
            )) {
                $this->log('vendor_rate', 'existing', $vendorId . ' / ' . $resourceType . ' #' . $resourceId);
                continue;
            }

            $this->db()->insert($this->table('vendor_rates'), [
                'vendor_id'     => $vendorId,
                'resource_type' => $resourceType,
                'resource_id'   => $resourceId,
                'rate_name'     => $this->text($row['rate_name'] ?? null),
                'unit_price'    => $unitPrice,
                'currency'      => strtoupper(sanitize_text_field((string) ($row['currency'] ?? 'INR'))),
                'start_date'    => $this->date($row['start_date'] ?? null),
                'end_date'      => $this->date($row['end_date'] ?? null),
                'priority'      => (int) ($row['priority'] ?? 10),
                'notes'         => $this->textarea($row['notes'] ?? null),
                'status'        => sanitize_key((string) ($row['status'] ?? 'active')),
                'created_at'    => current_time('mysql'),
                'updated_at'    => current_time('mysql'),
            ]);

            $this->log('vendor_rate', 'created', $vendorId . ' / ' . $resourceType . ' #' . $resourceId);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertSellRates(array $rows): void
    {
        foreach ($rows as $row) {
            $resourceType = sanitize_key((string) ($row['resource_type'] ?? 'service'));
            $resourceId = $this->resolveResource($row['resource'] ?? $row['resource_id'] ?? 0);
            $rateType = sanitize_key((string) ($row['rate_type'] ?? 'base'));
            $amount = (float) ($row['amount'] ?? 0);

            if ($this->exists(
                'rates',
                'resource_type=%s AND resource_id=%d AND rate_type=%s AND amount=%f',
                [$resourceType, $resourceId, $rateType, $amount]
            )) {
                $this->log('rate', 'existing', $resourceType . ' #' . $resourceId . ' / ' . $rateType);
                continue;
            }

            $this->db()->insert($this->table('rates'), [
                'resource_type' => $resourceType,
                'resource_id'   => $resourceId,
                'season_id'     => null,
                'start_date'    => $this->date($row['start_date'] ?? null),
                'end_date'      => $this->date($row['end_date'] ?? null),
                'rate_type'     => $rateType,
                'amount'        => $amount,
                'currency'      => strtoupper(sanitize_text_field((string) ($row['currency'] ?? 'INR'))),
                'min_quantity'  => (int) ($row['min_quantity'] ?? 1),
                'max_quantity'  => isset($row['max_quantity']) ? (int) $row['max_quantity'] : null,
                'priority'      => (int) ($row['priority'] ?? 10),
                'status'        => sanitize_key((string) ($row['status'] ?? 'active')),
                'created_at'    => current_time('mysql'),
                'updated_at'    => current_time('mysql'),
            ]);

            $this->log('rate', 'created', $resourceType . ' #' . $resourceId . ' / ' . $rateType);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertAvailability(array $rows): void
    {
        foreach ($rows as $row) {
            $resourceType = sanitize_key((string) ($row['resource_type'] ?? 'service'));
            $resourceId = $this->resolveResource($row['resource'] ?? $row['resource_id'] ?? 0);
            $serviceDate = $this->date($row['service_date'] ?? null);

            if ($resourceId <= 0 || $serviceDate === null) {
                continue;
            }

            if ($this->exists(
                'availability',
                'resource_type=%s AND resource_id=%d AND service_date=%s',
                [$resourceType, $resourceId, $serviceDate]
            )) {
                $this->log('availability', 'existing', $resourceType . ' #' . $resourceId . ' on ' . $serviceDate);
                continue;
            }

            $this->db()->insert($this->table('availability'), [
                'resource_type' => $resourceType,
                'resource_id'   => $resourceId,
                'service_date'  => $serviceDate,
                'capacity'      => (int) ($row['capacity'] ?? 0),
                'reserved'      => (int) ($row['reserved'] ?? 0),
                'blocked'       => (int) ($row['blocked'] ?? 0),
                'status'        => sanitize_key((string) ($row['status'] ?? 'open')),
                'notes'         => $this->textarea($row['notes'] ?? null),
            ]);

            $this->log('availability', 'created', $resourceType . ' #' . $resourceId . ' on ' . $serviceDate);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertBookings(array $rows): void
    {
        foreach ($rows as $row) {
            $bookingNumber = sanitize_text_field((string) ($row['booking_number'] ?? ''));

            if ($bookingNumber === '') {
                continue;
            }

            if ($this->exists('bookings', 'booking_number=%s', [$bookingNumber])) {
                $this->log('booking', 'existing', $bookingNumber);
                continue;
            }

            $customerEmail = $row['customer'] ?? '';
            $customerId = $customerEmail ? $this->idBy('customers', 'email=%s', [sanitize_email((string) $customerEmail)]) : 0;

            $this->db()->insert($this->table('bookings'), [
                'customer_id'    => $customerId > 0 ? $customerId : null,
                'booking_number' => $bookingNumber,
                'status'         => sanitize_key((string) ($row['status'] ?? 'pending')),
                'travel_start'   => $this->date($row['travel_start'] ?? null),
                'travel_end'     => $this->date($row['travel_end'] ?? null),
                'adults'         => (int) ($row['adults'] ?? 1),
                'children'       => (int) ($row['children'] ?? 0),
                'currency'       => strtoupper(sanitize_text_field((string) ($row['currency'] ?? 'INR'))),
                'subtotal'       => (float) ($row['subtotal'] ?? 0),
                'discount'       => (float) ($row['discount'] ?? 0),
                'tax'            => (float) ($row['tax'] ?? 0),
                'total'          => (float) ($row['total'] ?? 0),
                'deposit_due'    => (float) ($row['deposit_due'] ?? 0),
                'notes'          => $this->textarea($row['notes'] ?? null),
                'source'         => $this->text($row['source'] ?? null),
                'created_at'     => current_time('mysql'),
                'updated_at'     => current_time('mysql'),
            ]);

            $bookingId = (int) $this->db()->insert_id;

            foreach ((array) ($row['items'] ?? []) as $item) {
                $this->insertItem($bookingId, (array) $item);
            }

            foreach ((array) ($row['travelers'] ?? []) as $traveler) {
                $this->insertTraveler($bookingId, (array) $traveler);
            }

            foreach ((array) ($row['payments'] ?? []) as $payment) {
                $this->insertPayment($bookingId, (array) $payment);
            }

            $this->log('booking', 'created', $bookingNumber . ' (id ' . $bookingId . ')');
        }
    }

    /**
     * @param array<string, mixed> $item
     */
    private function insertItem(int $bookingId, array $item): void
    {
        $itemType = sanitize_key((string) ($item['item_type'] ?? 'service'));
        $objectId = $this->resolveResource($item['resource'] ?? $item['object_id'] ?? 0);
        $name = sanitize_text_field((string) ($item['name'] ?? ''));

        $vendorName = sanitize_text_field((string) ($item['vendor'] ?? ''));
        $vendorId = $vendorName !== '' ? $this->idBy('vendors', 'name=%s', [$vendorName]) : 0;

        $this->db()->insert($this->table('items'), [
            'booking_id'   => $bookingId,
            'item_type'    => $itemType,
            'object_id'    => $objectId > 0 ? $objectId : null,
            'name'         => $name,
            'quantity'     => (int) ($item['quantity'] ?? 1),
            'start_date'   => $this->date($item['start_date'] ?? null),
            'end_date'     => $this->date($item['end_date'] ?? null),
            'unit_price'   => (float) ($item['unit_price'] ?? 0),
            'total'        => (float) ($item['total'] ?? 0),
            'cost'         => (float) ($item['cost'] ?? 0),
            'vendor_id'    => $vendorId > 0 ? $vendorId : null,
            'vendor_name'  => $vendorName !== '' ? $vendorName : null,
            'meta'         => wp_json_encode((array) ($item['meta'] ?? [])),
            'created_at'   => current_time('mysql'),
        ]);

        $this->log('booking_item', 'created', $bookingId . ' / ' . $itemType . ' — ' . $name);
    }

    /**
     * @param array<string, mixed> $traveler
     */
    private function insertTraveler(int $bookingId, array $traveler): void
    {
        $this->db()->insert($this->table('travelers'), [
            'booking_id'      => $bookingId,
            'first_name'      => sanitize_text_field((string) ($traveler['first_name'] ?? '')),
            'last_name'       => $this->text($traveler['last_name'] ?? null),
            'date_of_birth'   => $this->date($traveler['date_of_birth'] ?? null),
            'nationality'     => $this->text($traveler['nationality'] ?? null),
            'passport_number' => $this->text($traveler['passport_number'] ?? null),
            'email'           => $traveler['email'] ?? null ? sanitize_email((string) $traveler['email']) : null,
            'phone'           => $this->text($traveler['phone'] ?? null),
            'meta'            => wp_json_encode((array) ($traveler['meta'] ?? [])),
            'created_at'      => current_time('mysql'),
            'updated_at'      => current_time('mysql'),
        ]);

        $this->log('traveler', 'created', $bookingId . ' / ' . ($traveler['first_name'] ?? ''));
    }

    /**
     * @param array<string, mixed> $payment
     */
    private function insertPayment(int $bookingId, array $payment): void
    {
        $this->db()->insert($this->table('payments'), [
            'booking_id'       => $bookingId,
            'gateway'          => sanitize_key((string) ($payment['gateway'] ?? 'manual')),
            'transaction_type' => sanitize_key((string) ($payment['transaction_type'] ?? 'payment')),
            'transaction_id'   => $this->text($payment['transaction_id'] ?? null),
            'status'           => sanitize_key((string) ($payment['status'] ?? 'completed')),
            'amount'           => (float) ($payment['amount'] ?? 0),
            'currency'         => strtoupper(sanitize_text_field((string) ($payment['currency'] ?? 'INR'))),
            'reference'        => $this->text($payment['reference'] ?? null),
            'paid_at'          => $payment['paid_at'] ?? null ? sanitize_text_field((string) $payment['paid_at']) : null,
            'meta'             => wp_json_encode((array) ($payment['meta'] ?? [])),
            'created_at'       => current_time('mysql'),
            'updated_at'       => current_time('mysql'),
        ]);

        $this->log('payment', 'created', $bookingId . ' / ' . ($payment['reference'] ?? $payment['transaction_id'] ?? ''));
    }

    /**
     * @param array<int, array<string, mixed>> $rows
     */
    private function insertSettlements(array $rows): void
    {
        foreach ($rows as $row) {
            $vendorName = sanitize_text_field((string) ($row['vendor'] ?? ''));
            $vendorId = $this->idBy('vendors', 'name=%s', [$vendorName]);

            if ($vendorId <= 0) {
                continue;
            }

            $amount = (float) ($row['amount'] ?? 0);
            $reference = $this->text($row['reference'] ?? null);

            if ($this->exists(
                'settlements',
                'vendor_id=%d AND amount=%f AND reference=%s',
                [$vendorId, $amount, $reference]
            )) {
                $this->log('settlement', 'existing', $vendorName . ' / ' . ($reference ?: $amount));
                continue;
            }

            $bookingNumber = sanitize_text_field((string) ($row['booking'] ?? ''));
            $bookingId = $bookingNumber !== '' ? $this->idBy('bookings', 'booking_number=%s', [$bookingNumber]) : 0;

            $this->db()->insert($this->table('settlements'), [
                'vendor_id'   => $vendorId,
                'booking_id'  => $bookingId > 0 ? $bookingId : null,
                'amount'      => $amount,
                'currency'    => strtoupper(sanitize_text_field((string) ($row['currency'] ?? 'INR'))),
                'reference'   => $reference,
                'settled_at'  => $this->datetime($row['settled_at'] ?? null),
                'notes'       => $this->textarea($row['notes'] ?? null),
                'created_at'  => current_time('mysql'),
                'updated_at'  => current_time('mysql'),
            ]);

            $this->log('settlement', 'created', $vendorName . ' / ' . ($reference ?: $amount));
        }
    }

    private function resolveResource(mixed $resource): int
    {
        if (is_int($resource) || (is_string($resource) && ctype_digit($resource))) {
            return (int) $resource;
        }

        if (is_array($resource) && count($resource) === 1) {
            $postType = (string) array_key_first($resource);
            $title = trim((string) reset($resource));

            if ($postType !== '' && $title !== '') {
                return $this->findPostByTitle($postType, $title);
            }
        }

        return 0;
    }

    private function findPostByTitle(string $postType, string $title): int
    {
        $query = new \WP_Query([
            'post_type'              => $postType,
            'post_status'            => ['publish', 'draft', 'pending', 'private'],
            'title'                  => $title,
            'posts_per_page'         => 1,
            'fields'                 => 'ids',
            'no_found_rows'          => true,
            'suppress_filters'       => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ]);

        return $query->have_posts() ? (int) $query->posts[0] : 0;
    }

    private function table(string $key): string
    {
        global $wpdb;

        return $wpdb->prefix . 'pwt_' . $key;
    }

    private function db(): object
    {
        global $wpdb;

        return $wpdb;
    }

    /**
     * @param array<int, mixed> $args
     */
    private function exists(string $tableKey, string $where, array $args): bool
    {
        global $wpdb;

        $sql = 'SELECT id FROM ' . $this->table($tableKey) . ' WHERE ' . $where . ' LIMIT 1';

        return (bool) $wpdb->get_var($wpdb->prepare($sql, $args));
    }

    /**
     * @param array<int, mixed> $args
     */
    private function idBy(string $tableKey, string $where, array $args): int
    {
        global $wpdb;

        $sql = 'SELECT id FROM ' . $this->table($tableKey) . ' WHERE ' . $where . ' LIMIT 1';

        return (int) $wpdb->get_var($wpdb->prepare($sql, $args));
    }

    /**
     * @param array<string, mixed> $log
     */
    private function log(string $type, string $action, string $name): void
    {
        $this->log[] = [
            'type'   => $type,
            'action' => $action,
            'name'   => $name,
        ];
    }

    private function text(mixed $value): ?string
    {
        $value = (string) ($value ?? '');

        return $value === '' ? null : sanitize_text_field($value);
    }

    private function textarea(mixed $value): ?string
    {
        $value = (string) ($value ?? '');

        return $value === '' ? null : sanitize_textarea_field($value);
    }

    private function date(mixed $value): ?string
    {
        $value = (string) ($value ?? '');

        return $value === '' ? null : sanitize_text_field($value);
    }

    private function datetime(mixed $value): ?string
    {
        $value = (string) ($value ?? '');

        return $value === '' ? null : sanitize_text_field($value);
    }
}