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
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.setAssetsPath('<?php echo Yii::app()->baseUrl; ?>/themes/assets/');
            Metronic.setGlobalImgPath('<?php echo Yii::app()->baseUrl; ?>/themes/assets/global/img/');
            Metronic.init();
            Layout.init();
            <?php /*
            $('#dashboard-report-range').daterangepicker({
                    opens: (Metronic.isRTL() ? 'right' : 'left'),
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2014',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: false,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    buttonClasses: ['btn btn-sm'],
                    applyClass: ' blue',
                    cancelClass: 'default',
                    format: 'MM/DD/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Apply',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom Range',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                },
                function (start, end) {
                    $('#dashboard-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            );
            $('#dashboard-report-range span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#dashboard-report-range').show();
            */?>
        });
        <?php
            if (!empty($this->pageLevelScripts)) {
                foreach ($this->pageLevelScripts as $script) {
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
