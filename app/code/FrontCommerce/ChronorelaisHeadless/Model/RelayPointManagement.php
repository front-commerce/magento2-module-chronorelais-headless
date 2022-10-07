<?php

namespace FrontCommerce\ChronorelaisHeadless\Model;

use Exception;
use FrontCommerce\ChronorelaisHeadless\Api\RelayPointManagementInterface;
use Magento\Checkout\Model\Session;
use Magento\Quote\Api\CartRepositoryInterface;

class RelayPointManagement implements RelayPointManagementInterface
{
    protected const METHOD_CODE = 'chronorelais';

    protected RelayPoint $relayPoint;
    protected Session $session;
    protected CartRepositoryInterface $cartRepository;

    public function __construct(
        RelayPoint              $relayPoint,
        Session                 $session,
        CartRepositoryInterface $cartRepository
    )
    {
        $this->relayPoint = $relayPoint;
        $this->cartRepository = $cartRepository;
        $this->session = $session;
    }

    /**
     * @throws Exception
     */
    public function getRelayPoints(string $postcode, string $countryId, string $city = '', array $street = []): array
    {
        return $this->formatRelayResponseData(
            $this->relayPoint->getRelayPoints(self::METHOD_CODE, $postcode, $countryId, $city, $street)
        );
    }

    protected function formatRelayResponseData(array $relayPoints): array
    {
        if (!$relayPoints) {
            return [];
        }

        $result = [];
        foreach ($relayPoints as $relayPoint) {
            $result[] = [
                'street1' => $relayPoint->adresse1,
                'street2' => $relayPoint->adresse2,
                'street3' => $relayPoint->adresse3,
                'latitude' => $relayPoint->latitude,
                'longitude' => $relayPoint->longitude,
                'zipcode' => $relayPoint->codePostal,
                'id' => $relayPoint->identifiantChronopostPointA2PAS,
                'city' => $relayPoint->localite,
                'name' => $relayPoint->nomEnseigne,
                'openingTime' => [
                    'Monday' => $relayPoint->horairesOuvertureLundi,
                    'Tuesday' => $relayPoint->horairesOuvertureMardi,
                    'Wednesday' => $relayPoint->horairesOuvertureMercredi,
                    'Thursday' => $relayPoint->horairesOuvertureJeudi,
                    'Friday' => $relayPoint->horairesOuvertureVendredi,
                    'Saturday' => $relayPoint->horairesOuvertureSamedi,
                    'Sunday' => $relayPoint->horairesOuvertureDimanche,
                ],
            ];
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    public function setQuoteRelayId(string $customerId, string $pickupId): bool
    {
        try {
            $quote = $this->cartRepository->getActiveForCustomer($customerId);
        } catch (Exception $e) {
            throw new Exception(__('Can\'t found the customer quote'));
        }

        $this->cartRepository->save(
            $quote->setRelaisId($pickupId)
        );

        return true;
    }
}
