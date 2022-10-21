<?php

namespace FrontCommerce\ChronorelaisHeadless\Api;

interface RelayPointManagementInterface
{
    /**
     * @param string $postcode
     * @param string $countryId
     * @param string $city
     * @param string[] $street
     * @return array[]
     */
    public function getRelayPoints(string $postcode, string $countryId, string $city = '', array $street = []): array;

    /**
     * @param string $customerId
     * @param string $pickupId
     * @return bool
     */
    public function setQuoteRelayId(string $customerId, string $pickupId): bool;
}
