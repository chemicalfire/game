<?php /* @var $this Controller */ ?>
<?php
$this->pageLevelPlugins[] = array(
    'link' => Yii::app()->baseUrl . '/themes/metronic/assets/global/plugins/bootstrap-daterangepicker/moment.min.js',
);
$this->pageLevelPlugins[] = array(
    'link' => Yii::app()->baseUrl . '/themes/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js',
);
$this->pageLevelPluginStyles[] = array(
    'link' => Yii::app()->baseUrl . '/themes/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',

);

$this->pageLevelBodyClasses += Yii::app()->getParams()->theme['body_classes'];
?>
<?php $this->beginContent('//layouts/main'); ?>
<body class="<?php echo implode(' ', $this->pageLevelBodyClasses);?>">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
<!-- BEGIN HEADER INNER -->
<div class="page-header-inner container">
<!-- BEGIN LOGO -->
<div class="page-logo">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>">
        <img src="<?php echo Yii::app()->getParams()->theme['logo_file']; ?>">
    </a>
    <div class="menu-toggler sidebar-toggler">
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
    </div>
</div>
<!-- END LOGO -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN PAGE ACTIONS -->
<!-- DOC: Remove "hide" class to enable the page header actions -->
<!-- /* Widget::pageActions -->
<?php /*
        <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span><i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> New User
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-present"></i> New Event
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-basket"></i> New Order
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span><i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-docs"></i> New Post
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-tag"></i> New Comment
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-share"></i> New Share
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-flag"></i> Comments <span class="badge badge-danger">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-users"></i> Feedbacks <span class="badge badge-warning">12</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        */?>
<!-- Widget::pageActions */ -->
<!-- END PAGE ACTIONS -->
<!-- BEGIN PAGE TOP -->
<div class="page-top">
<!-- BEGIN HEADER SEARCH BOX -->
<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
<form class="search-form search-form-expanded" action="" action="GET">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                    </span>
    </div>
</form>
<!-- END HEADER SEARCH BOX -->
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
<ul class="nav navbar-nav pull-right">
<!-- BEGIN NOTIFICATION DROPDOWN -->
<?php /*
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-danger"> 7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <p>You have 14 new notifications</p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                            New user registered. <span class="time">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span>
                                            Server #12 overloaded. <span class="time">15 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bell-o"></i>
                                            </span>
                                            Server #2 not responding. <span class="time">22mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                            </span>
                                            Application error. <span class="time">40 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span>
                                            Database overloaded 68% <span class="time">2 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span>
                                            2 user IP blocked. <span class="time">5 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </span>
                                            Storage Server #4 not responding. <span class="time">45 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                            </span>
                                            System Error. <span class="time">55 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span>
                                            Database overloaded 68% <span class="time">2 hrs</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="external">
                                <a href="#">
                                    See all notifications <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    */?>
<!-- END NOTIFICATION DROPDOWN -->
<!-- BEGIN INBOX DROPDOWN -->
<?php /*
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-primary"> 4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <p>You have 12 new messages</p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                    <li>
                                        <a href="#">
                                            <span class="photo">
                                                <img src="" alt="">
                                            </span>
                                            <span class="subject">
                                                <span class="from">Lisa Wong</span>
                                                <span class="time">Just Now</span>
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco ...
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="external">
                                <a href="#">
                                    See all messages <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    */?>
<!-- END INBOX DROPDOWN -->
<!-- BEGIN TODO DROPDOWN -->
<?php /*
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-success"> 3 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li>
                                <p>You have 12 pending tasks</p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                    <li>
                                        <a href="#">
                                            <span class="task">
                                                <span class="desc">New release v1.2</span>
                                                <span class="percent">40%</span>
                                            </span>
                                            <div class="progress">
                                                <div style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valumin="0" aria-valuemax="100">
                                                    <div class="sr-only">40% Complete</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="external">
                                <a href="#">
                                    See all tasks <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    */?>
<!-- END TODO DROPDOWN -->
<!-- BEGIN QUICK SIDEBAR TOGGLER -->
<!--
<li class="dropdown dropdown-quick-sidebar-toggler">
    <a href="javascript:;" class="dropdown-toggle">
        <i class="icon-logout"></i>
    </a>
</li>
-->
<!-- END QUICK SIDEBAR TOGGLER -->
<!-- BEGIN USER LOGIN DROPDOWN -->
<?php /*
                    <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img src="" alt="" class="img-circle">
                            <span class="username username-hide-on-mobile"> Bob </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-calendar"></i> My Calendar
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-rocket"></i> My Tasks <span class="badge badge-sucess"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="icon-lock"></i> Lock Screen
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-key"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                    */?>
<!-- END USER LOGIN DROPDOWN -->
</ul>
</div>
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END PAGE TOP -->
</div>
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="container">
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php $this->widget('themes.metronic.widgets.SidebarMenu', array('items' => Yii::app()->getParams()->theme['sidebar_menu_items'],)); ?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM -->
                <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Widget settings form gose here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM -->
                <!-- BEGIN STYLE CUSTOMIZER -->
                <?php /*
                div class="theme-panel">
                    <div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click to open advance theme customizer panel">
                        <i class="icon-settings"></i>
                    </div>
                    <div class="toggle-close">
                        <i class="icon-close"></i>
                    </div>
                    <div class="theme-options">
                        <div class="theme-option theme-colors clearfix">
                            <span> THEME COLOR </span>
                            <ul>
                                <li class="color-default current tooltops" data-style="default" data-container="body" data-original-title="Default"></li>
                                <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"></li>
                                <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"></li>
                                <li class="color-dark tooltips" data-style="dark" data-container="body" data-original-title="Dark"></li>
                                <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"></li>
                            </ul>
                        </div>
                        <div class="theme-option">
                            <span> Layout </span>
                            <select class="layout-option form-control input-small">
                                <option value="fluid" selected="selected">Fluid</option>
                                <option value="boxed">Boxed</option>
                            </select>
                        </div>
                        <div class="theme-option">
                            <span> Header </span>
                            <select class="page-header-option form-control input-small">
                                <option value="fixed" selected="selected">Fixed</option>
                                <option value="default">Default</option>
                            </select>
                        </div>
                        <div class="theme-option">
                            <span> Sidebar Mode </span>
                            <select class="sidebar-option form-control input-small">
                                <option value="fixed">Fixed</option>
                                <option value="default" selected="selected">Default</option>
                            </select>
                        </div>
                        <div class="theme-option">
                            <span> Sidebar Style </span>
                            <select class="sidebar-style-option form-control input-small">
                                <option value="default" selected="selected">Default</option>
                                <option value="compact">Compact</option>
                            </select>
                        </div>
                        <div class="theme-option">
                            <span> Sidebar Menu </span>
                            <select class="sidebar-menu-option form-control input-small">
                                <option value="accordion" selected="selected">Accordion</option>
                                <option value="hover">Hover</option>
                            </select>
                        </div>
                        <div class="theme-option">
                            <span> Sidebar Position </span>
                            <select class="sidebar-pos-option form-control input-small">
                                <option value="left" selected="selected">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                        <div class="theme-option">
                            <span> Footer </span>
                            <select class="page-footer-option form-control input-small">
                                <option value="fixed">Fixed</option>
                                <option value="default" selected="selected">Default</option>
                            </select>
                        </div>
                    </div>
                </div>
                */?>
                <!-- END STYLE CUSTOMIZER -->
                <!-- BEGIN PAGE HEADER -->
                <h3 class="page-title"><?php echo CHtml::encode($this->pageTitle); ?></h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <!-- /* Widget::Breadcrumb -->
                        <?php $this->widget('themes.metronic.widgets.Breadcrumb', array('items' => $this->breadcrumbs));?>
                        <!-- */ -->
                    </ul>
                    <?php /*
                    <div class="page-toolbar">
                        <div id="dashboard-report-range" class="tooltips btn btn-fit-height btn-sm green-haze btn-dashboard-daterange" data-container="body" data-placement="left" data-original-title="Change dashboard date range">
                            <i class="icon-calendar"></i>
                            <!--
                            &nbsp;&nbsp;
                            <i class="fa fa-angle-down"></i>
                            -->
                            &nbsp;&nbsp;
                            <span class="thin uppercase visible-lg-inline-block"></span>&nbsp;<i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                    */?>
                </div>
                <!-- END PAGE HEADER -->
                <!-- BEGIN MAIN CONTENT -->

                <div id="main-content">
                    <?php echo $content; ?>
                </div><!-- content -->

                <!-- END MAIN CONTENT -->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">
            2014 &copy; Metronic by keenthemes.
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>
<!-- END CONTAINER -->
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

