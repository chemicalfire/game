<?php
/* @var $this HomeController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs[] = array('title' => $this->pageTitle, 'link' => array('home/index'),);
$appConfig = $this->getAppConfig();

// 判断上线日期
$time = time();
$date = date('Y-m-d', $time);
$onlineDate = $appConfig['online_date'];
$onlineTime = strtotime($onlineDate);
$onlined = false;
if ($time > $onlineTime) {
    $onlined = true;
}
$appRootPath = realpath($appConfig['app_root']);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>欢迎进入<i><?php echo CHtml::encode(Yii::app()->name); ?></i>&nbsp;<small>项目<?php if ($onlined) : ?> 已于<?php else : ?>预定于<?php endif; ?><?php echo $onlineDate; ?>上线。</small></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>项目主要配置信息</h3>
            <p>
                <dl class="dl-horizontal">
                    <dt>项目根目录</dt>
                    <dd><?php echo $appRootPath; ?></dd>
                    <dt>版本控制系统目录</dt>
                    <dd><?php echo realpath($appConfig['vms_code_path']); ?></dd>
                    <dt>后端代码所在目录</dt>
                    <dd><?php echo realpath($appConfig['backend_code_path']); ?></dd>
                    <dt>部署工具所在目录</dt>
                    <dd><?php echo realpath($appConfig['tools_path']); ?></dd>
                    <dt>配置文件所在目录</dt>
                    <dd><?php echo realpath($appConfig['config_path']); ?></dd>
                    <dt>当前平台</dt>
                    <dd><?php echo $appConfig['platform']; ?></dd>
                    <dt>当前部署机代号：</dt>
                    <dd><?php echo $appConfig['deploy_id']; ?></dd>
                    <dt>项目开发人员</dt>
                    <?php foreach ($appConfig['members'] as $member) : ?>
                        <dd>
                            姓名：<?php echo $member['name']; ?> &nbsp; 邮箱：<?php echo $member['email']; ?> &nbsp; 角色：<?php echo implode('，', $member['roles']); ?>
                        </dd>
                    <?php endforeach; ?>
                </dl>
            </p>
        </div>
    </div>
</div>
