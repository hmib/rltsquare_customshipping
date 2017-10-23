<?php

namespace Rltsquare\CustomShipping\Model\Plugin\Shipping\Rate\Result;
use \Rltsquare\CustomShipping\Helper\Data;
class Append
{
    /**
     * @var \Magento\Checkout\Model\Session|\Magento\Backend\Model\Session\Quote
     */
    protected $session;

    /**
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Backend\Model\Session\Quote $backendQuoteSession
     * @param \Magento\Framework\App\State $state
     * @internal param Session $session
     */
    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Backend\Model\Session\Quote $backendQuoteSession,
        \Magento\Framework\App\State $state,
        Data $custom_shipping_helper
    ) {
        $this->_customShippingHelper = $custom_shipping_helper; 
        //$this->messageManager->addSuccessMessage('Air methods not available...');
        
        if ($state->getAreaCode() == \Magento\Framework\App\Area::AREA_ADMINHTML) {
            $this->session = $backendQuoteSession;
        } else {
            $this->session = $checkoutSession;
        }
    }

    public function beforeAppend($subject, $result)
    {
        if (!$result instanceof \Magento\Quote\Model\Quote\Address\RateResult\Method) {
            return [$result];
        }

        $filtableMethods = [
            'flatrate_flatrate',
            'tablerate_bestway',
            
        ];
        $methodCode = $result->getCarrier() . '_' . $result->getMethod();
        if (!in_array($methodCode, $filtableMethods)) {
            return [$result];
        }

        
        $quote = $this->session->getQuote();
        $quoteItems = $quote->getAllItems();
        $heavyWeightFlag = false;
        
        foreach ($quoteItems as $item) {
            $pid = $item->getProductId();
            $prod = $this->_customShippingHelper->getProductById($pid);
            $package_id = $prod->getAttributeText('package_id');
            
	if (strtolower($package_id) != '') {
                $heavyWeightFlag = true;
                continue;
            }
        }
        
        if ($heavyWeightFlag == true) {
            $result->setIsDisabled(true);
        }
        
        //$this->_logger->addDebug('some text or variable');
        return [$result];
    }
}
