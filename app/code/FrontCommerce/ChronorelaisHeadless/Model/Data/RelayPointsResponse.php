<?php

namespace FrontCommerce\ChronorelaisHeadless\Model\Data;

use FrontCommerce\ChronorelaisHeadless\Api\Data\RelayPointsResponseInterface;
use Magento\Framework\Model\AbstractModel;

class RelayPointsResponse extends AbstractModel implements RelayPointsResponseInterface
{
    /**
     * @return string
     */
    public function getRelayId(): string
    {
        return $this->getData(self::RELAY_ID);
    }

    /**
     * @param string $relay_id
     * @return RelayPointsResponseInterface
     */
    public function setRelayId(string $relay_id): RelayPointsResponseInterface
    {
        return $this->setData(self::RELAY_ID, $relay_id);
    }

    /**
     * @return string
     */
    public function getStreet1(): string
    {
        return $this->getData(self::STREET1);
    }

    /**
     * @param string $street1
     * @return RelayPointsResponseInterface
     */
    public function setStreet1(string $street1): RelayPointsResponseInterface
    {
        return $this->setData(self::STREET1, $street1);
    }

    /**
     * @return string
     */
    public function getStreet2(): string
    {
        return $this->getData(self::STREET2);
    }

    /**
     * @param string $street2
     * @return RelayPointsResponseInterface
     */
    public function setStreet2(string $street2): RelayPointsResponseInterface
    {
        return $this->setData(self::STREET2, $street2);
    }

    /**
     * @return string
     */
    public function getStreet3(): string
    {
        return $this->getData(self::STREET3);
    }

    /**
     * @param string $street3
     * @return RelayPointsResponseInterface
     */
    public function setStreet3(string $street3): RelayPointsResponseInterface
    {
        return $this->setData(self::STREET3, $street3);
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->getData(self::LATITUDE);
    }

    /**
     * @param string $latitude
     * @return RelayPointsResponseInterface
     */
    public function setLatitude(string $latitude): RelayPointsResponseInterface
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->getData(self::LONGITUDE);
    }

    /**
     * @param string $longitude
     * @return RelayPointsResponseInterface
     */
    public function setLongitude(string $longitude): RelayPointsResponseInterface
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->getData(self::ZIPCODE);
    }

    /**
     * @param string $zipCode
     * @return RelayPointsResponseInterface
     */
    public function setZipCode(string $zipCode): RelayPointsResponseInterface
    {
        return $this->setData(self::ZIPCODE, $zipCode);
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->getData(self::CITY);
    }

    /**
     * @param string $city
     * @return RelayPointsResponseInterface
     */
    public function setCity(string $city): RelayPointsResponseInterface
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     * @return RelayPointsResponseInterface
     */
    public function setName(string $name): RelayPointsResponseInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return array
     */
    public function getOpeningTime(): array
    {
        return $this->getData(self::OPENING_TIME);
    }

    /**
     * @param array $openingTime
     * @return RelayPointsResponseInterface
     */
    public function setOpeningTime(array $openingTime): RelayPointsResponseInterface
    {
        return $this->setData(self::OPENING_TIME, $openingTime);
    }
}
