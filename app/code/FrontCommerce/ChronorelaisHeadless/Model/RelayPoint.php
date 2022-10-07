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
    public function getRelayPoints(
        string $methodCode,
        string $postcode,
        string $countryId,
        string $city,
        array  $street
    ): array
    {
        $street = implode(' ', $street);
        $shippingAddress = $this->addressFactory->create();

        return $this->helperWebservice->getPointRelaisByAddress(
            $methodCode,
            $shippingAddress
                ->setData('postcode', $postcode)
                ->setData('city', $city ?: 'unknown')
                ->setData('country', $countryId ?: 'unknown')
                ->setData('street', $street ?: 'unknown')
        );
    }
}
