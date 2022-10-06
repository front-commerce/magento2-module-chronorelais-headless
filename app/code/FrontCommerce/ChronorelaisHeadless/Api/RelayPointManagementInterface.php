<?php

namespace FrontCommerce\ChronorelaisHeadless\Api;

interface RelayPointManagementInterface
{
    /**
     * @param string $methodCode
     * @param string $postCode
     * @param string[] $shippingAddress
     * @return \FrontCommerce\ChronorelaisHeadless\Api\Data\RelayPointsResponseInterface[]
     */
    public function getRelayPoints(string $postCode, array $shippingAddress): array;

    /**
     * @param string $customerId
     * @param string $pickupId
     * @return bool
     */
    public function setQuoteRelayId(string $customerId, string $pickupId): bool;
}
