<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/31/2015
 * Time: 8:03 AM
 */
class Widget_Slider_Adminhtml_SlideController extends Mage_Adminhtml_Controller_Action
{
    public static $_currentSlider;

    public function _initAction()
    {
        $this->loadLayout();
        return $this;
    }

    public function indexAction()
    {
        $id    = $this->getRequest()->getParam('id');
        $model = Mage::getModel('widget_slider/slide')->load($id);
        if ($model->getId()) {
            self::$_currentSlider = $id;
            Mage::register('slider_id', $id);
        }
        $this->_initAction();
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id    = $this->getRequest()->getParam('id');
        $model = Mage::getModel('widget_slider/slide')->load($id);
        if ($model->getId() || $id == 0) {
            $data = $this->_getSession()->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }
            Mage::register('slide', $model);
            $this->loadLayout();
//            $this->_setActiveMenu('slider');
            $this->_addBreadcrumb(
                Mage::helper('adminhtml')->__('Slide Manager'),
                Mage::helper('adminhtml')->__('Slide Manager')
                );

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()->createBlock('widget-slider/adminhtml_slider_slide_edit'));
            $this->_addLeft($this->getLayout()->createBlock('widget-slider/adminhtml_slider_slide_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(
                Mage::helper('widget_slider')->__('Slide does not exist')
                );
            $this->_redirect('*/*/view');
        }
    }

//
    public function saveAction()
    {
        self::$_currentSlider = $this->getRequest()->getParam('slider_id');
        $redirectParams       = ['id' => self::$_currentSlider];
        $redirectPath         = '*/*/index';
        // check if data sent
        $data = $this->getRequest()->getPost();

        if ($data) {
            // init model and set data
            $model      = Mage::getModel('widget_slider/slide');
            $copy_model = clone $model;
            // if news item exists, try to load it
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
                $copy_model = $model;
                if ($copy_model->getData('slider_id')) {
                    self::$_currentSlider = $copy_model->getData('slider_id');
                }
            }
            // check change position
            if ($data['position'] != $copy_model->getData('position')) {
                $sliderHasSamePositionCollection = Mage::getModel('widget_slider/slide')->getCollection();
                $sliderHasSamePositionCollection->addAttributeToFilter('position', $data['position']);
                $sliderHasSamePosition = $sliderHasSamePositionCollection->getFirstItem();
                Mage::getModel('widget_slider/slide')->load($sliderHasSamePosition->getId())
                ->setPosition($copy_model->getPosition())->save();
            }
            try {
                $hasError    = false;
                $imageHelper = Mage::helper('widget_slider/image');

                foreach ($data as $k => $attr) {
                    if ($attr == '') {
                        unset($data[$k]);
                    };
                }

                $model->addData($data)->addData(['slider_id' => self::$_currentSlider]);


                // upload new image
                $imageFile = $imageHelper->uploadImage('image');
                if ($imageFile) {
                    $imageHelper->removeImage($copy_model->getImage()['value']);
                    $model->addData(['image' => $imageFile]);
                }

                // save the data
                $model->save();

                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('widget_slider')->__('The Slide item has been saved.')
                    );

                $redirectParams['id'] = self::$_currentSlider;
                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $redirectPath   = '*/*/edit';
                    $redirectParams = ['slider_id' => self::$_currentSlider, 'id' => $copy_model->getId()];
                }
            } catch (Mage_Core_Exception $e) {
                $hasError = true;
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $hasError = true;
                $this->_getSession()->addException($e,
                    Mage::helper('widget_slider')->__($e->getMessage())
                    );
            }
            if ($hasError) {
                $this->_getSession()->setFormData($data);
                $redirectPath   = '*/*/edit';
                $redirectParams = ['id' => $this->getRequest()->getParam('id'), 'slider_id' => self::$_currentSlider];
            }
        }

        $this->_redirect($redirectPath, $redirectParams);
    }

    /**
     * delete  action
     */
    public function massDeleteAction()
    {
        self::$_currentSlider = $this->getRequest()->getParam('slider_id');
        $ids                  = $this->getRequest()->getParam('slide');
        if (!is_array($ids)) {
            Mage::getSingleton('admin/session')->addErorr(Mage::helper('adminhtml')->__('Please select Slide(s)!'));
        } else {
            try {
                $imageHelper = Mage::helper('widget_slider/image');
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('widget_slider/slide')->load($id);
                    // remove image
                    if ($model->getImage()) {
                        $imageHelper->removeImage($model->getImage());
                    }
                    Mage::getModel('widget_slider/slide')->load($id)->delete();
                }
                $this->_getSession()->addSuccess(Mage::helper('adminhtml')->__('Deleted %d Slide!', count($ids)));
            } catch (Exception $e) {
                $this->_getSession()->addErorr(Mage::helper('adminhtml')->__($e->getMessage()));
            }
        }
        $this->_redirect('*/*/index', ['id' => self::$_currentSlider]);
    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        $itemId               = $this->getRequest()->getParam('id');
        self::$_currentSlider = $this->getRequest()->getParam('slider_id');
        if ($itemId) {
            try {
                // init model and delete
                $model = Mage::getModel('widget_slider/slide')->load($itemId);
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('widget_slider')->__('Unable to find a slider item.'));
                }
                $imageHelper = Mage::helper('widget_slider/image');

                // remove image
                if ($model->getImage()) {
                    $imageHelper->removeImage($model->getImage());
                }
                Mage::getModel('widget_slider/slide')->load($itemId)->delete();

                // display success message
                $this->_getSession()->addSuccess(
                    Mage::helper('widget_slider')->__('The slider item has been deleted.')
                    );
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('widget_slider')->__('An error occurred while deleting the news item.')
                    );
            }
        }

        // go to grid
        $this->_redirect('*/*/index', ['id' => self::$_currentSlider]);
    }

    /**
     *change status action
     */
    public function massStatusAction()
    {
        self::$_currentSlider = $this->getRequest()->getParam('slider_id');
        $ids                  = $this->getRequest()->getParam('slide');
        $status               = $this->getRequest()->getParam('status');
        if (!is_array($ids)) {
            $this->_getSession()->addErorr(Mage::helper('adminhtml')->__('Please select Slide(s)!'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = Mage::getSingleton('widget_slider/slide')->load($id)
                    ->setStatus($status)
                    ->setIsMassupdate(true)
                    ->save();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Changed status %d Slide!', count($ids)));
            } catch (Exception $e) {
                $this->_getSession()->addErorr(Mage::helper('adminhtml')->__($e->getMessage()));
            }
        }
        $this->_redirect('*/*/index', ['id' => self::$_currentSlider]);
    }

    /**
     * Grid ajax action
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('widget-slider/adminhtml_slider_slide_grid')->toHtml()
            );
    }


}