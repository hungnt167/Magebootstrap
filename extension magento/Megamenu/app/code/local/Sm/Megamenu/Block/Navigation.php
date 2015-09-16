<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 7:26 PM
 */
class Sm_Megamenu_Block_Navigation extends Mage_Catalog_Block_Navigation
{

    const PATH_TEMPLATE = 'sm/megamenu/login.phtml';

    public function drawMenu()
    {
        $helper = Mage::helper('sm_megamenu');
        $html
                = '<ul class="megamenu skyblue">
                    <li class="showhide" style="display: none;">
                        <span class="title">' . $this->__("MENU") . '</span>
                        <span class="icon1"></span><span class="icon2"></span>
                    </li>';
        if ($helper->hasShowHomeLink()) {
            $html .= '<li class="active" style=""><a href="';
            $html .= Mage::getBaseUrl();
            $html .= '">' . $this->__("MENU") . '</a></li>';
        }

        $categories = $this->getItem();
        foreach ($categories as $k => $category) {
            if ($category->getChildrenCount() > 0) {
                if ($helper->getType() == $helper::$vertical_type) {
                    $html .= '<li>';
                    $html .= $this->drawATag($category);
                    $html .= '<ul class="dropdown">';
                    $html .= $this->drawVerticalContent($category->getLevel(), $category->getId());
                    $html .= '</ul>';
                    $html .= '</li>';
                } else {
                    $html .= '<li>';
                    $html .= $this->drawATag($category);
                    $html
                        .= '             <div class="megapanel">';
                    $html .= $this->drawHorizontalContent($category->getLevel(), $category->getId(), $helper->column());
                    $html
                        .= '
                                     </div>';
                    $html .= '</li>';
                }
            } else {
                if ($helper->hasShowProduct()) {
                    $html .= '<li>';
                    $html .= $this->drawATag($category);
                    $html
                        .= '             <div class="megapanel">';
                    $html .= $this->drawProductContent($category->getId(), $helper->qtyProducts(), $helper->column());
                    $html
                        .= '
                                     </div>';
                    $html .= '</li>';
                }
            }
        }
        if ($helper->hasFormLogin()) {
            $html .= $this->drawForm();
        }


//

        $html
            .= ' </ul>';
        return $html;
    }

    public function drawForm($label = 'Login')
    {
        $loginForm = Mage::app()->getLayout()->createBlock("core/template")
            ->setTemplate(self::PATH_TEMPLATE);
        $html      = '<li class="right">';
        $html .= '    <a href="#">' . $label . '</a>';
        $html .= '    <div class="megapanel">';
        $html .= '            <div class="div">';
        $html .= $loginForm->toHtml();
        $html .= '            </div>';
        $html .= '    </div>';
        $html .= '</li>';
        return $html;
    }

    public function drawProductContent($categoryId, $qty = 10, $col = 4)
    {
        $html              = '';
        $productCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->joinField('category_id', 'catalog/category_product', 'category_id', 'product_id = entity_id', null, 'left')
            ->addAttributeToSelect('*')
            ->addAttributeToSort('created_at', 'desc')
            ->addAttributeToFilter('category_id', $categoryId)
            ->addAttributeToFilter('status', 1)
            ->setPageSize($qty);
        $size              = 1020 / $col;
        $row               = ceil(6 / $col);
        $colClass          = intval(6 / $col);
        $products          = [];
        $sum               = count($productCollection);
        foreach ($productCollection as $product) {
            $products[] = $product->getData();
        }
        for ($i = 0, $j = 0; $i < $row; $i++) {
            $html .= '<div class="row">';
            $html .= '    <div class="col6">';
            for ($g = 0; $g < $col; $g++) {
                if ($j < $sum) {
                    $html .= "              <div class='col" . $colClass . "'>";
                    $html .= '                  <a href="' . Mage::getBaseUrl() . $products[$j]['url_path'] . '">';
                    if ($products[$j]['image'] != '') {
                        $model = Mage::getSingleton('catalog/product')->load($products[$j]['entity_id']);
                        $image = Mage::helper('catalog/image')->init($model, 'small_image')->resize($size, $size);;
                        $html .= "              <img   src='" . $image . "'/>";
                    }
                    $html .= '                    <h3>' . $products[$j]['name'] . '</h3>';
                    $html .= '                </a>';
                    $html .= '              </div>';
                }
                $j++;
            }
            $html .= '    </div>';
            $html .= '</div>';
        }
        return $html;
    }

    public function drawVerticalContent($level, $parentId)
    {
        $html       = '';
        $categories = $this->getItem($level, $parentId);
        foreach ($categories as $k => $category) {
            $html .= '<li><a href="';
            $html .= Mage::getBaseUrl() . $category->getUrlPath();
            $html .= '">';
            $html .= $category->getName();
            $html .= '</a>';
            if ($category->getChildrenCount() > 0) {
                $html .= '<ul class="dropdown">';
                $html .= $this->drawVerticalContent($category->getLevel(), $category->getId());
                $html .= '</ul>';
            }
            $html .= '</li>';
        }

        return $html;
    }

    public function drawHorizontalContent($level, $parentId, $col = 4)
    {
        $helper=Mage::helper('sm_megamenu');
        $categoryCollection = $this->getItem($level, $parentId);
        $html               = '';
        $isShowImage=$helper->isShowImage();
        $colClass           = intval(6 / $col);
        $categories         = [];
        $sum                = count($categoryCollection);
        foreach ($categoryCollection as $category) {
            $categories[] = $category->getData();
        }
        for ($i = 0, $j = 0; $i < $colClass; $i++) {
            $html .= '<div class="row">';
            $html .= '    <div class="col6">';
            for ($g = 0; $g < $col; $g++) {
                if ($j < $sum) {
                    $html .= "              <div class='col" . $colClass . "'>";
                    $html .= '                  <a href="' . Mage::getBaseUrl() . $categories[$j]['url_path'] . '">';
                    if ($isShowImage) {
                        if ($categories[$j]['image'] != '') {
                            $html .= "              <img  src='" . Mage::getBaseUrl('media') . 'catalog/category/' . $categories[$j]['image'] . "'/>";
                        }
                    }
                    $html .= '                    <h3>' . $categories[$j]['name'] . '</h3>';
                    if ($categories[$j]['children_count'] > 0) {
                        $html .= '                    <div class="row">';
                        $html .= $this->drawHorizontalChild($categories[$j]['level'] + 1, $categories[$j]['entity_id']);
                        $html .= '                    </div>';
                    }
                    $html .= '                </a>';
                    $html .= '              </div>';
                }
                $j++;
            }
            $html .= '    </div>';
            $html .= '</div>';
        }


        return $html;
    }

    public function drawHorizontalChild($level, $parentId)
    {
        $helper=Mage::helper('sm_megamenu');
        $isShowImage=$helper->isShowImage();
        $html        = '';
        $categories  = $this->getItem($level, $parentId);
        foreach ($categories as $k => $category) {
            $html .= '                        <div class="col6">';
            $html .= '<a href="';
            $html .= Mage::getBaseUrl() . $category->getUrlPath();
            $html .= '">';
            $image = $category->getImage();

            if ($isShowImage) {
                if ($image != '') {
                    $html .= '<div class="col2">';
                    $html .= "              <img  src='" . Mage::getBaseUrl('media') . 'catalog/category/' . $image . "'/>";
                    $html .= '</div>';
                    $html .= '<div class="col4">';
                } else {
                    $html .= '<div class="col2"></div>';
                    $html .= '<div class="col4">';
                }
            } else {
                $html .= '<div class="col2"></div>';
                $html .= '<div class="col4">';
            }
            $html .= '<h4>' . $category->getName() . '</h4>';
            if ($category->getChildrenCount() > 0) {
                $html .= '<div class="row">';
                $html .= $this->drawHorizontalChild($category->getLevel() + 1, $category->getId());
                $html .= '</div>';
            }
            $html .= '</div>';
            $html .= '</a>';
            $html .= '                        </div>';
        }

        return $html;
    }

    public function drawATag($category)
    {
        return '<a href="' . Mage::getBaseUrl() . $category->getUrlPath() . '">' . $category->getName() . '</a>';
    }

    public function getItem($level = 2, $parentId = 0)
    {
        $helper=Mage::helper('sm_megamenu');
        if ($level <= $helper->maxLevel()) {
            if ($parentId != 0) {
                $items = Mage::getModel('catalog/category')->getCollection()
                    ->addAttributeToSelect('*')
                    ->addAttributeToFilter('is_active', 1)
                    ->addAttributeToFilter('include_in_menu', 1)
                    ->addAttributeToFilter('parent_id', $parentId);
                return $items;
            }
            $items = Mage::getModel('catalog/category')->getCollection()
                ->addAttributeToSelect('*')
                ->addAttributeToFilter('is_active', 1)
                ->addAttributeToFilter('include_in_menu', 1)
                ->addAttributeToFilter('level', $level);
            return $items;
        }
        return;
    }


}