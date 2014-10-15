<?php

class BreadCrumb extends CWidget
{

    public $items = array();
    public $breadcrumbs = array();

    public function init()
    {
        parent::init();
        $this->normalizeBreadcrumbs();
    }


    public function run()
    {
        parent::run();
        echo '<li>';
        echo '<i class="fa fa-home"></i>';
        if (!empty($this->breadcrumbs)) {
            echo '<i class="fa fa-angle-right"></i>';
        }
        echo '</li>';
        echo $this->renderBreadcrumbs();
     }
    protected function renderBreadcrumbs()
    {
        if (!empty($this->breadcrumbs)) {
            return implode('', $this->breadcrumbs);
        }
    }


    protected function normalizeBreadcrumbs()
    {
        // items: [{title : '', link: [], icon : ''}, ....]
        if (!empty($this->items)) {
            foreach ($this->items as $key => $breadcrumb) {
                if (!isset($breadcrumb['title']) || empty($breadcrumb['title'])) {
                    continue;
                }
                $html = '';
                if (isset($breadcrumb['icon']) && !empty($breadcrumb['icon'])) {
                    $html .= '<i class="fa fa-' . $breadcrumb['icon'] . '"></i>';
                }
                if (isset($breadcrumb['link']) && !empty($breadcrumb['link'])) {
                    $html.= '<a href="' . CHtml::normalizeUrl($breadcrumb['link']) . '">';
                } else {
                    $html .= '<a href="javascript:;">';
                }
                $html .= CHtml::encode($breadcrumb['title']);
                $html .= '</a>';
                if (isset($this->items[$key + 1])) {
                    $html .= '<i class="fa fa-angle-right"></i>';
                }
                $html = '<li>' . $html . '</li>';
                $this->breadcrumbs[] = $html;
            }
        }
    }
}