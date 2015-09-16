<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 7:23 PM
 */
class Sm_Megamenu_Block_Menu extends Mage_Core_Block_Template
{
    const PATH_TEMPLATE = 'sm/megamenu/menu.phtml';
    const POSITION = 'top.menu';
    const PATH_SKIN_CSS = 'css/sm/megamenu/megamenu.css';
    const PATH_SKIN_JS = 'js/sm/megamenu/megamenu.js';

    /**
     * Preparing global layout
     * You can redefine this method in child classes for changing layout
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        $helper = Mage::helper('sm_megamenu');
        if (Mage::getStoreConfig($helper::PATH_CONFIG_ENABLE_EXTENSION)) {
            $head = $this->getLayout()->getBlock('head');
            $head->addItem('skin_css', self::PATH_SKIN_CSS);
            $head->addItem('skin_js', self::PATH_SKIN_JS);
            $template = $this->getLayout()->createBlock('core/template')->setTemplate(self::PATH_TEMPLATE);
            $this->getLayout()->getBlock(self::POSITION)->append($template);
        }


    }


}