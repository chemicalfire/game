<?php
$this->pageLevelScripts[] = <<<JAVASCRIPT
jQuery(document).ready(function () {
    Login.init();
});
JAVASCRIPT;
$this->pageLevelStyles[] = array(
    'link' => Yii::app()->baseUrl . '/themes/metronic/assets/admin/page/css/login.css',
);
$this->pageLevelBodyClasses[] = 'login';
?>
<div class="logo"></div>
<div class="content">
    <form class="login-form" action="" method="post">
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close=""alert></button>
            <span>Enter any username and password.</span>
        </div>
        <div class="form-group">
            <!-- ie8, ie9 dose not support html5 placeholder, so we just show field title for that -->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-actions">
            <label class="checkbox" style="margin-left: 20px;">
                <input type="checkbox" name="remember" value="1"> Remember me
            </label>
            <button type="submit" class="btn green pull-right"> Login <i class="m-icon-swapright m-icon-white"></i></button>
        </div>
    </form>
</div>