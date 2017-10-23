<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

/**
 * Shipping data helper
 */
namespace Rltsquare\CustomShipping\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
class Data extends AbstractHelper
{
    
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Model\ProductRepository $productRepo
    ) {
        $this->_productRepo = $productRepo;
        parent::__construct($context);
    }


      /**
       * Load product from productId
       *
       * @param $id
       * @return $this
       */
      public function getProductById($id)
      {
          return $this->_productRepo->getById($id);
      }
}
