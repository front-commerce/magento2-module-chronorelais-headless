<?php

namespace FrontCommerce\ChronorelaisHeadless\Model;

use Chronopost\Chronorelais\Helper\Webservice as HelperWebservice;
use Exception;
use Magento\Quote\Model\Quote\AddressFactory;

class RelayPoint
{
    protected AddressFactory $addressFactory;
    protected HelperWebservice $helperWebservice;

    public function __construct(
        AddressFactory   $addressFactory,
        HelperWebservice $helperWebservice
    )
    {
        $this->addressFactory = $addressFactory;
        $this->helperWebservice = $helperWebservice;
    }

    /**
     * @throws Exception
     */
    public function getRelayPoints(string $methodCode, string $postCode, array $shippingAddress): array
    {
        $shippingAddress = $this->addressFactory->create()->setData($shippingAddress);

        return $this->helperWebservice->getPointRelaisByAddress(
            $methodCode,
            $shippingAddress
                ->setData('postcode', $postCode)
                ->setData('city', $shippingAddress['city'] ?: 'unknown')
                ->setData('country', $shippingAddress['country_id'] ?: 'unknown')
                ->setData('street', $shippingAddress['street'] ?: 'unknown')
        );
    }
}