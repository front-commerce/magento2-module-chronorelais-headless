<?php

namespace FrontCommerce\ChronorelaisHeadless\Api;

interface RelayPointManagementInterface
{
    /**
     * @param string $postCode
     * @param string[] $shippingAddress
     * @return \FrontCommerce\ChronorelaisHeadless\Api\Data\RelayPointsResponseInterface[]
     */
    public function getRelayPoints(string $postCode, array $shippingAddress): array;
}
