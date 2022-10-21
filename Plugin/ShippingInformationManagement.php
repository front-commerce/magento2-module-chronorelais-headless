<?php declare(strict_types=1);

namespace FrontCommerce\ChronorelaisHeadless\Plugin;

use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Chronopost\Chronorelais\Helper\Data;
use Magento\Checkout\Model\ShippingInformationManagement as MagentoShippingInformationManagement;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Quote\Api\CartRepositoryInterface;
use Chronopost\Chronorelais\Helper\Webservice as HelperWebservice;

class ShippingInformationManagement
{
    protected CheckoutSession $checkoutSession;
    protected CartRepositoryInterface $quoteRepository;
    protected HelperWebservice $helperWebservice;
    protected Data $helper;

    public function __construct(
        CheckoutSession         $checkoutSession,
        CartRepositoryInterface $cartRepository,
        HelperWebservice        $webservice,
        Data                    $helper
    )
    {
        $this->checkoutSession = $checkoutSession;
        $this->quoteRepository = $cartRepository;
        $this->helperWebservice = $webservice;
        $this->helper = $helper;
    }

    /**
     * @throws NoSuchEntityException
     */
    public function beforeSaveAddressInformation(
        MagentoShippingInformationManagement $subject,
        int                                  $cartId,
        ShippingInformationInterface         $addressInformation
    )
    {
        try {
            $quote = $this->quoteRepository->get($cartId);
            $this->checkoutSession->setData('chronopost_chronorelais_relais_id', (string)$quote->getRelaisId());
        } catch (\Exception $e) {
        }
    }
}
