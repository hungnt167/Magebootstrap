<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 7:32 PM
 */
class Sm_Megamenu_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }
}