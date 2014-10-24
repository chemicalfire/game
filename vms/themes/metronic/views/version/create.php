<?php /* @var $this Controller */ ?>
<?php
$this->breadcrumbs[] = array('title' => '版本管理', );
$this->breadcrumbs[] = array('title' => '创建版本', 'link' => array('version/create'));

// 添加select2页面插件
$this->pageLevelPlugins[] = array(
    'link' => Yii::app()->baseUrl . '/themes/metronic/assets/global/plugins/select2-3.5.1/select2.js',
);
$this->pageLevelPluginStyles[] = array(
    'link' => Yii::app()->baseUrl . '/themes/metronic/assets/global/plugins/select2-3.5.1/select2.css',
);
$this->pageScripts[] = <<<SCRIPT
jQuery('.select2').select2();
SCRIPT;
!isset($front_versions) && $front_versions = array();
!isset($backend_versions) && $backend_versions = array();
!isset($script_versions) && $script_versions = array();
!isset($config_versions) && $config_versions = array();
!isset($asset_versions) && $asset_versions = array();
?>
<div class="row"">
    <div class="col-md-12">
        <form class="form form-horizontal" method="post" action="<?php echo CHtml::normalizeUrl(array('version/create')); ?>" style="background-color: #ffffff;">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">版本编号</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="0.0.0" name="version[code]" value="<?php echo isset($_POST['version']['code']) ? $_POST['version']['code'] : null; ?>">
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">展示给用户的版本号</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">版本日志</label>
                            <div class="col-md-5">
                                <textarea style="resize: none;" class="form-control" placeholder="..." name="version[log]"><?php echo isset($_POST['version']['log']) ? $_POST['version']['log'] : null; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">前端版本</label>
                            <div class="col-md-5">
                                <select style="padding: 0px; padding-top: 5px;" class="select2 col-md-12" placeholder="请选择" name="version[frontend]">
                                    <option></option>
                                    <?php foreach ($front_versions as $version) : ?>
                                        <option value="<?php echo $version; ?>"><?php echo $version; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">前端代码版本分支</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">后端版本</label>
                            <div class="col-md-5">
                                <select style="padding: 0px; padding-top: 5px;" class="select2 col-md-12" placeholder="请选择" name="version[backend]">
                                    <option></option>
                                    <?php foreach ($backend_versions as $version) : ?>
                                        <option value="<?php echo $version; ?>"><?php echo $version; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">后端代码版本分支</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">脚本版本</label>
                            <div class="col-md-5">
                                <select style="padding: 0px; padding-top: 5px;" class="select2 col-md-12" placeholder="请选择" name="version[script]">
                                    <option></option>
                                    <?php foreach ($script_versions as $version) : ?>
                                        <option value="<?php echo $version; ?>"><?php echo $version; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">脚本代码版本分支</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">配置版本</label>
                            <div class="col-md-5">
                                <select style="padding: 0px; padding-top: 5px;" class="select2 col-md-12" placeholder="请选择" name="version[config]">
                                    <option></option>
                                    <?php foreach ($config_versions as $version) : ?>
                                        <option value="<?php echo $version; ?>"><?php echo $version; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">配置版本分支</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">asset版本</label>
                            <div class="col-md-5">
                                <select style="padding: 0px; padding-top: 5px;" class="select2 col-md-12" placeholder="请选择" name="version[asset]">
                                    <option></option>
                                    <?php foreach ($asset_versions as $version) : ?>
                                        <option value="<?php echo $version; ?>"><?php echo $version; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">asset版本分支</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue pull-right">
                            <i class="fa fa-check"></i> &nbsp; <span>创建新版本</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
