<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 7:27 PM
 */
/*
 * Check enabled extension
 * */
$helper = Mage::helper('sm_megamenu');
if (!Mage::getStoreConfig($helper::PATH_CONFIG_ENABLE_EXTENSION)) {
    class Sm_Megamenu_Block_Topmenu extends Mage_Page_Block_Html_Topmenu
    {
    }
} else {
    class Sm_Megamenu_Block_Topmenu extends Sm_Megamenu_Block_Navigation
    {
    }
}
