<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<!-- <link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"> -->
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<!-- Uncomment the google fonts api if it dosen't cost much time to load -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/css/google-font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLE -->
    <?php
    if (!empty($this->pageLevelPluginStyles)) {
        foreach ($this->pageLevelPluginStyles as $style) {
            echo '<link rel="stylesheet" type="text/css" href="' . $style['link'] . '"';
            unset($style['link']);
            if (!empty($style)) {
                $attrs = array();
                foreach ($style as $key => $value) {
                    $attrs[] = $key . '="' . $value . '"';
                }
                echo implode(' ', $attrs);
            }
            echo '>';
        }
    }
    ?>
	<!-- END PAGE LEVEL PLUGIN STYLE -->
	<!-- BEGIN PAGE LEVEL STYLES -->
    <?php
    if (!empty($this->pageLevelStyles)) {
        foreach ($this->pageLevelStyles as $style) {
            echo '<link rel="stylesheet" type="text/css" href="' . $style['link'] . '"';
            unset($style['link']);
            if (!empty($style)) {
                $attrs = array();
                foreach ($style as $key => $value) {
                    $attrs[] = $key . '="' . $value . '"';
                }
                echo implode(' ', $attrs);
            }
            echo '>';
        }
    }
    ?>
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/css/components.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/global/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/admin/layout/css/layout.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/admin/layout/css/themes/default.css" id="style_color">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/metronic/assets/admin/layout/css/custom.css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico">
</head>
<?php echo $content; ?>
</html>
