<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:12 AM
 */
class Widget_Slider_Adminhtml_SliderController extends Mage_Adminhtml_Controller_Action
{
    public static $_currentSlider;

    public function _initAction()
    {
        $this->loadLayout();
        return $this;
    }

    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {

        $id    = $this->getRequest()->getParam('id');
        $model = Mage::getModel('widget_slider/slider')->load($id);
        if ($model->getId() || $id == 0) {
            $data = $this->_getSession()->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }
            Mage::register('slider', $model);
            $this->loadLayout();
            $this->_addBreadcrumb(
                Mage::helper('adminhtml')->__('Slider  Manager'),
                Mage::helper('adminhtml')->__('Slider  Manager')
                );

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()->createBlock('widget-slider/adminhtml_slider_edit'))
            ->_addLeft($this->getLayout()->createBlock('widget-slider/adminhtml_slider_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(
                Mage::helper('widget_slider')->__('Slider does not exist')
                );
            $this->_redirect('*/*/');
        }
    }

    public function saveAction()
    {
        $redirectPath   = '*/*';
        $redirectParams = [];

        // check if data sent
        $data = $this->getRequest()->getPost();
        if ($data) {
            // init model and set data
            $model      = Mage::getModel('widget_slider/slider');
            $copy_model = clone $model;
            // if news item exists, try to load it
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
                $copy_model = $model;
            }
            foreach ($data as $k => $attr) {
                if ($attr == '') {
                    unset($data[$k]);
                };
            }
            $model->addData($data);

            try {
                $hasError = false;
                // save the data

                $model->save();
                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('widget_slider')->__('The Slider has been saved.')
                    );

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $redirectPath   = '*/*/edit';
                    $redirectParams = ['id' => $copy_model->getId()];
                }
            } catch (Mage_Core_Exception $e) {
                $hasError = true;
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $hasError = true;
                $this->_getSession()->addException($e,
                    Mage::helper('widget_slider')->__('An error occurred while saving the slider.')
                    );
            }

            if ($hasError) {
                $this->_getSession()->setFormData($data);
                $redirectPath   = '*/*/edit';
                $redirectParams = ['id' => $this->getRequest()->getParam('id')];
            }
        }

        $this->_redirect($redirectPath, $redirectParams);
    }

    /**
     * delete  action
     */
    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('slider');
        if (!is_array($ids)) {
            Mage::getSingleton('admin/session')->addErorr(Mage::helper('adminhtml')->__('Please select Slider (s)!'));
        } else {
            try {
                foreach ($ids as $id) {
                    Mage::getSingleton('widget_slider/slider')->load($id)->delete();
                }
                $this->_getSession()->addSuccess(Mage::helper('adminhtml')->__('Deleted %d Slider !', count($ids)));
            } catch (Exception $e) {
                $this->_getSession()->addErorr(Mage::helper('adminhtml')->__($e->getMessage()));
            }
        }
        $this->_redirect('*/*/index');
    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        $itemId = $this->getRequest()->getParam('id');
        if ($itemId) {
            try {
                // init model and delete
                $model = Mage::getModel('widget_slider/slider')->load($itemId);
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('widget_slider')->__('Unable to find a slider .'));
                }

                Mage::getModel('widget_slider/slider')->load($itemId)->delete();

                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('widget_slider')->__('The  slider has been deleted.')
                    );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('widget_slider')->__('An error occurred while deleting the slider.')
                    );
            }
        }

        // go to grid
        $this->_redirect('*/*/');
    }

    /**
     * Grid ajax action
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('widget-slider/adminhtml_slider_grid')->toHtml()
            );
    }



}