<?php 
    namespace Bhavesh\Deliverydate\Setup\Patch\Data;

    use Magento\Eav\Setup\EavSetup; 
    use Magento\Eav\Setup\EavSetupFactory; 
    use Magento\Framework\Setup\ModuleDataSetupInterface; 
    use Magento\Framework\Setup\Patch\DataPatchInterface; 

 class AddDeliveryDateAttribute implements DataPatchInterface { 
    private $moduleDataSetup; 
    private $eavSetupFactory; 
    public function __construct( ModuleDataSetupInterface $moduleDataSetup, EavSetupFactory $eavSetupFactory ) 
    { 
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute('catalog_product', 'delivery_date', [
            'type' => 'date',
            'backend' => '',
            'frontend' => '',
            'label' => 'Delivery Date',
            'input' => 'date',
            'class' => '',            
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => true,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => 'simple,configurable',
            'group' => 'General'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}