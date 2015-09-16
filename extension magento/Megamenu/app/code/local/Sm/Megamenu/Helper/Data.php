<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 7:25 PM
 */
class Sm_Megamenu_Helper_Data extends Mage_Core_Helper_Abstract
{
    const PATH_CONFIG_ENABLE_EXTENSION = 'sm_megamenu_section/general/enabled';

    const PATH_CONFIG_SHOW_HOME_LINK = 'sm_megamenu_section/general/show_home_link';
    const PATH_CONFIG_SHOW_FORM_LOGIN = 'sm_megamenu_section/general/show_form_login';
    const PATH_CONFIG_SHOW_PRODUCT = 'sm_megamenu_section/general/show_product_in_empty_category';
    const PATH_CONFIG_QTY_PRODUCT = 'sm_megamenu_section/general/quantity_showed_products';
    const PATH_CONFIG_SHOW_THUMBNAIL = 'sm_megamenu_section/general/display_thumbnail_categories';
    const PATH_CONFIG_TYPE = 'sm_megamenu_section/general/type';
    const PATH_CONFIG_COLUMN = 'sm_megamenu_section/general/column';
    const PATH_CONFIG_MAX_LEVEL = 'sm_megamenu_section/general/max_level';

    public static $horizontal_type = 0;
    public static $vertical_type = 1;

    public function menuToHtml()
    {
        $blockClassName = Mage::getConfig()->getBlockClassName('sm_megamenu/navigation');
        $block          = new $blockClassName();

        return $block->drawMenu();
    }

    public function getType()
    {
        return $this->getConfig(self::PATH_CONFIG_TYPE);
    }

    public function hasShowHomeLink()
    {
        return $this->getConfig(self::PATH_CONFIG_SHOW_HOME_LINK);
    }

    public function hasShowProduct()
    {
        return $this->getConfig(self::PATH_CONFIG_SHOW_PRODUCT);
    }
    public function hasFormLogin()
    {
        return $this->getConfig(self::PATH_CONFIG_SHOW_FORM_LOGIN);
    }
    public function isShowImage()
    {
        return $this->getConfig(self::PATH_CONFIG_SHOW_THUMBNAIL);
    }
    public function maxLevel(){
        return $this->getConfig(self::PATH_CONFIG_MAX_LEVEL);
    }
    public function qtyProducts()
    {
        return $this->getConfig(self::PATH_CONFIG_QTY_PRODUCT);
    }

    public function column()
    {
        return $this->getConfig(self::PATH_CONFIG_COLUMN);
    }

    /*
    * @para path
    * @return config system
    * */
    public function getConfig($path)
    {
        return Mage::getStoreConfig($path);
    }

}