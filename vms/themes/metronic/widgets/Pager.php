<?php

/**
 * Class Pager
 *
 */
class Pager extends CWidget
{

    public $pager;
    public $url;
    public $ceils = array();

    public function init()
    {
        parent::init();
        if (!empty($this->url)) {
            $this->url = CHtml::normalizeUrl($this->url);
        }
    }


    public function run()
    {
        parent::run();
        $html = <<<HTML
<form class="form form-inline dataTables_wrapper dataTables_extended_wrapper no-footer" method="get" action="{$this->url}">
    <div class="dataTables_paginate paging_bootstrap_extended" style="display: inline-block;">
        <div class="pagination-panel">
            第
            <a href="#" class="btn btn-sm default prev disabled" title="Prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <input type="text" class="pagination-panel-input form-control input-mini input-inline input-sm" maxlength="5" style="text-align: center; margin: 0px 5px;" name="page" value="{$this->pager->currentPage}">
            <a href="#" class="btn btn-sm default next disabled" title="Next">
                <i class="fa fa-angle-right"></i>
            </a>
            页 | 共 {$this->pager->pageCount} 页
        </div>
    </div>
    <div class="dataTables_length">
        <label>
            <span class="seperator">|</span>
            每页
            <select name="ceil" class="form-control input-xsmall input-sm input-inline">
HTML;
        foreach ($this->ceils as $ceil) {
            if ($this->pager->pageSize == $ceil) {
                $html .= '<option value="' . $ceil . '" selected="selected">' . $ceil . '</option>';
            } else {
                $html .= '<option value="' . $ceil . '">' . $ceil . '</option>';
            }
        }
        $html .= <<<HTML
            </select>
            条
        </label>
    </div>
    <div class="dataTables_info">
        <span class="seperator">|</span>
        共有 {$this->pager->itemCount} 条
        <button type="submit" class="btn btn-sm yellow">
            <i class="fa fa-search"></i>
            &nbsp;查看
        </button>
    </div>
</form>
HTML;
        echo $html;
    }
}