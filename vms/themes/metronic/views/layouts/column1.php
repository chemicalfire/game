<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<body class="<?php echo implode(' ', $this->pageLevelBodyClasses) ?>">
    <!-- BEGIN MAIN CONTENT -->
    <div id="main-content">
        <?php echo $content; ?>
    </div><!-- content -->
    <!-- END MAIN CONTENT -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <?php
        if (!empty($this->pageLevelPlugins)) {
            foreach ($this->pageLevelPlugins as $plugin) {
                echo '<script type="' . ((isset($plugin['type']) && !empty($plugin['type'])) ? $plugin['type'] : 'text/javascript') . '" src="' . $plugin['link'] . '"></script>';
            }
        }
    ?>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/scripts/metronic.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/admin/layout/scripts/layout.js"></script>
    <?php
    if (!empty($this->pageLevelScripts)) {
        foreach ($this->pageLevelScripts as $script) {
            echo '<script type="' . ((isset($script['type']) && !empty($script['type'])) ? $script['type'] : 'text/javascript') . '" src="' . $script['link'] . '"></script>';
        }
    }
    ?>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.setAssetsPath('<?php echo Yii::app()->baseUrl; ?>/themes/assets/');
            Metronic.setGlobalImgPath('<?php echo Yii::app()->baseUrl; ?>/themes/assets/global/img/');
            Metronic.init();
            Layout.init();
        });
        <?php
            if (!empty($this->pageScripts)) {
                foreach ($this->pageScripts as $script) {
                    echo $script;
                }
            }
        ?>
    </script>
    <!-- END JAVASCRIPTS -->
    <script type="text/javascript">
        // statistics scripts
    </script>
</body>
<?php $this->endContent(); ?>
