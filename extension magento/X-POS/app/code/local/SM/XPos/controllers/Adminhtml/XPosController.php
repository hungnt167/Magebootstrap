<?php

/**
 * Created by PhpStorm.
 * User: SMART
 * Date: 9/11/2015
 * Time: 4:23 PM
 */
class SM_XPos_Adminhtml_XPosController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function searchCustomerAction()
    {
        $keyword= $this->getRequest()->getParam('customer');
         $states = [
             ['value'=>'Val','tokens'=>['Val']],
             ['value'=>'Val','tokens'=>['Alaska']],
             ['value'=>'Val','tokens'=>['Arizona']],
             ['value'=>'Val','tokens'=>['Arkansas']],
             ['value'=>'Val','tokens'=>['California']],
    ];
        $this->getResponse()->clearHeaders()->setHeader('Content-type','application/json',true);
        $this->getResponse()->setBody(json_encode($states));
    }
}