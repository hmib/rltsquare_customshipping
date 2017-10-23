<?php


namespace Rltsquare\CustomShipping\Model\Plugin\Shipping\Rate\Result;

class GetAllRates
{
//    public function __construct(
//        \Magento\Framework\Message\ManagerInterface $messageManager
//    ) {
//        $this->messageManager = $messageManager;
////        $this->messageManager->addSuccessMessage('Air methods not available...');
//    }
//    
    public function afterGetAllRates($subject, $result)
    {
        $i = 0;
        foreach ($result as $key => $rate) {
            if ($rate->getIsDisabled()) {
                unset($result[$key]);
            }
            $i++;
        }
        
        return $result;
    }
}