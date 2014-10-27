<?php /* @var $this Controller */ ?>
<?php
$this->breadcrumbs[] = array('title' => '版本管理', );
$this->breadcrumbs[] = array('title' => '历史版本', 'link' => array('version/list'));
?>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo CHtml::normalizeUrl(array('version/create')); ?>" class="btn yellow pull-right">
            <i class="fa fa-plus"></i>
            <span class="hidden-480">创建版本</span>
        </a>
    </div>
</div>
<br>
<?php if (!empty($versions)) : ?>
<div class="row">
    <!-- BEGINE PAGER -->
    <div class="col-md-8">
        <?php $this->widget('themes.metronic.widgets.Pager', array(
            'pager' => $pager,
            'url' => array('version/list'),
            'ceils' => array(
                10, 20, 30, 40
            ),
        ));?>
    </div>
    <!-- END PAGER -->
    <!-- BEGIN TABLE ACTIONS -->
    <div class="col-md-4"></div>
    <!-- END TABLE ACTIONS -->
</div>
<?php else : ?>
<div class="row">
    <div class="col-md-12">
        <div class="note note-warning note-bordered">
            <span>没有查询到版本</span>
        </div>
    </div>
</div>
<?php endif; ?>
