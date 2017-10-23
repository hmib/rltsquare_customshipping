<?php
/* app/code/Atwix/TestAttribute/Setup/InstallData.php */

namespace Rltsquare\CustomShipping\Setup;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\Resource\Eav\Attribute;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        /* assign object to class global variable for use in other class methods */
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
         $setup->startSetup();
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $atr_set = 'Default';
        $atr_group = 'Properties';
        $atr_code='package_id';
        $atr_label='Package ID';
        $values = ['hazmat','oversized'];

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,$atr_code,
            [
                'group' => '',
                'type' => 'text',
                'frontend' => '',
                'label' => $atr_label,
                'input' => 'select',
                'class' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => '',
                'option' => [
                                'values' => $values
                            ],
            ]
        );
        $attributeSetId = $eavSetup->getAttributeSetId(\Magento\Catalog\Model\Product::ENTITY,$atr_set);
        $eavSetup->addAttributeToSet(\Magento\Catalog\Model\Product::ENTITY,$attributeSetId,$atr_group,$atr_code);
    

        $setup->endSetup();
    }
}
