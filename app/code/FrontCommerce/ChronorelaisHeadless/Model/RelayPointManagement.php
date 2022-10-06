<?php

namespace FrontCommerce\ChronorelaisHeadless\Model;

use Exception;
use FrontCommerce\ChronorelaisHeadless\Api\Data\RelayPointsResponseInterface;
use FrontCommerce\ChronorelaisHeadless\Api\RelayPointManagementInterface;
use Magento\Checkout\Model\Session;
use Magento\Quote\Api\CartRepositoryInterface;

class RelayPointManagement implements RelayPointManagementInterface
{
    protected const METHOD_CODE = 'chronorelais';

    protected RelayPoint $relayPoint;
    protected RelayPointsResponseInterface $relayPointsResponse;
    protected Session $session;
    protected CartRepositoryInterface $cartRepository;

    public function __construct(
        RelayPoint                   $relayPoint,
        RelayPointsResponseInterface $relayPointsResponse,
        Session                      $session,
        CartRepositoryInterface      $cartRepository
    )
    {
        $this->relayPoint = $relayPoint;
        $this->relayPointsResponse = $relayPointsResponse;
        $this->cartRepository = $cartRepository;
        $this->session = $session;
    }

    /**
     * @throws Exception
     */
    public function getRelayPoints(string $postCode, array $shippingAddress): array
    {
        $this->checkParams($postCode, $shippingAddress);

        return $this->formatRelayResponseData(
            $this->relayPoint->getRelayPoints(self::METHOD_CODE, $postCode, $shippingAddress)
        );
    }

    protected function formatRelayResponseData(array $relayPoints): array
    {
        if (!$relayPoints) {
            return [];
        }

        $result = [];
        $relayPoints = json_decode(json_encode($relayPoints));

        foreach ($relayPoints as $relayPoint) {
            $relayPoint = json_decode(json_encode($relayPoint));

            $result[] = clone $this->relayPointsResponse
                ->setStreet1($relayPoint->adresse1)
                ->setStreet2($relayPoint->adresse2)
                ->setStreet3($relayPoint->adresse3)
                ->setLatitude($relayPoint->latitude)
                ->setLongitude($relayPoint->longitude)
                ->setZipCode($relayPoint->codePostal)
                ->setRelayId($relayPoint->identifiantChronopostPointA2PAS)
                ->setName($relayPoint->nomEnseigne)
                ->setCity($relayPoint->localite)
                ->setName($relayPoint->nomEnseigne)
                ->setOpeningTime([
                    'Monday' => $relayPoint->horairesOuvertureLundi,
                    'Tuesday' => $relayPoint->horairesOuvertureMardi,
                    'Wednesday' => $relayPoint->horairesOuvertureMercredi,
                    'Thursday' => $relayPoint->horairesOuvertureJeudi,
                    'Friday' => $relayPoint->horairesOuvertureVendredi,
                    'Saturday' => $relayPoint->horairesOuvertureSamedi,
                    'Sunday' => $relayPoint->horairesOuvertureDimanche,
                ]);
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    protected function checkParams(string $postCode, array $shippingAddress)
    {
        if (!$postCode) {
            throw new Exception(__('Missing post_code'));
        }

        if (!isset($shippingAddress['country_id'])) {
            throw new Exception(__('Missing shipping address country_id'));
        }
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
