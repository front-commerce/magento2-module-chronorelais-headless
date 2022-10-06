<?php

namespace FrontCommerce\ChronorelaisHeadless\Api\Data;

interface RelayPointsResponseInterface
{
    const STREET1 = 'street1';
    const STREET2 = 'street2';
    const STREET3 = 'street3';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';
    const ZIPCODE = 'zipcode';
    const CITY = 'city';
    const NAME = 'name';
    const OPENING_TIME = 'opening_time';
    const RELAY_ID = 'relay_id';

    /**
     * @return string
     */
    public function getRelayId(): string;

    /**
     * @param string $relay_id
     * @return RelayPointsResponseInterface
     */
    public function setRelayId(string $relay_id): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getStreet1(): string;

    /**
     * @param string $street1
     * @return RelayPointsResponseInterface
     */
    public function setStreet1(string $street1): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getStreet2(): string;

    /**
     * @param string $street2
     * @return RelayPointsResponseInterface
     */
    public function setStreet2(string $street2): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getStreet3(): string;

    /**
     * @param string $street3
     * @return RelayPointsResponseInterface
     */
    public function setStreet3(string $street3): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getLatitude(): string;

    /**
     * @param string $latitude
     * @return RelayPointsResponseInterface
     */
    public function setLatitude(string $latitude): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getLongitude(): string;

    /**
     * @param string $longitude
     * @return RelayPointsResponseInterface
     */
    public function setLongitude(string $longitude): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getZipCode(): string;

    /**
     * @param string $zipCode
     * @return RelayPointsResponseInterface
     */
    public function setZipCode(string $zipCode): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @param string $city
     * @return RelayPointsResponseInterface
     */
    public function setCity(string $city): RelayPointsResponseInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return RelayPointsResponseInterface
     */
    public function setName(string $name): RelayPointsResponseInterface;

    /**
     * @return string[]
     */
    public function getOpeningTime(): array;

    /**
     * @param array $openingTime
     * @return RelayPointsResponseInterface
     */
    public function setOpeningTime(array $openingTime): RelayPointsResponseInterface;
}
