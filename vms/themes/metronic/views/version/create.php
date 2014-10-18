<?php /* @var $this Controller */ ?>
<?php
$this->breadcrumbs[] = array('title' => '版本管理', );
$this->breadcrumbs[] = array('title' => '发布版本', 'link' => array('version/create'));
?>
<div class="row">
    <div class="col-md-12">
        <div class="note note-warning note-bordered">
            <p>
                <span>新增加的前台、后台、脚本 TAG 在下面的下拉框中可能不存在，需要点击按钮手动刷新</span>
            </p>
        </div>
    </div>
</div>
<div class="row"">
    <div class="col-md-12">
        <form class="form form-horizontal" method="post" action="<?php echo CHtml::normalizeUrl(array('version/create')); ?>">
            <div class="row">
                <div class="col-md-10">
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
                                <input type="text" class="form-control" placeholder="0.0.0" name="version[modules][frontend]" value="<?php echo isset($_POST['version']['modules']['frontend']) ? $_POST['version']['modules']['frontend'] : null; ?>">
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">前端代码版本分支</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">后端版本</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="0.0.0" name="version[modules][backend]" value="<?php echo isset($_POST['version']['modules']['backend']) ? $_POST['version']['modules']['backend'] : null ; ?>">
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">后端代码版本分支</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">脚本版本</label>
                            <div class="col-md-5">
                                <input class="form-control" type="text" placeholder="0.0.0" name="version[modules][script]" value="<?php echo isset($_POST['version']['modules']['script']) ? $_POST['version']['modules']['script'] : null; ?>">
                            </div>
                            <div class="col-md-4">
                                <span class="help-block">脚本代码版本分支</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo CHtml::normalizeUrl(array('version/create')); ?>" target="_self" class="btn yellow btn-circle btn-default pull-right">
                                <i class="fa fa-refresh"></i> &nbsp; <span>刷新</span>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn blue btn-circle btn-default pull-right">
                                <i class="fa fa-check"></i> &nbsp; <span>发布</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
