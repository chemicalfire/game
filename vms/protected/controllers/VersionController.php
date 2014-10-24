<?php


class VersionController extends Controller
{


    public function actionList()
    {
        // 搜索出历史版本信息的表格
        $page = 1; // 默认的页数
        $ceil = 20; // 每页默认的记录条数

        if (isset($_GET['page'])) {
            $page = intval($page);
        }
        if (isset($_GET['ceil'])) {
            $ceil = intval($_GET['ceil']);
        }
        $page = max(1, $page);
        $ceil = max(1, $ceil);

        $criteria = new CDbCriteria();
        $versionModel = Version::model();
        $total = $versionModel->count();
        $pager = new CPagination($total);
        $pager->pageSize = $ceil;
        $pager->currentPage = $page;

        $pager->applyLimit($criteria);
        $versions = $versionModel->findAll($criteria);

        return $this->render('list', array('versions' => $versions, 'pager' => $pager));
    }


    public function actionCreate()
    {
        $front_versions = array();
        $front_version = null;
        $backend_versions = array();
        $backend_version = null;
        $script_versions = array();
        $script_version = null;
        return $this->render('create', array(
            'front_versions' => $front_versions,
            'front_version' => $front_version,
            'backend_versions' => $backend_versions,
            'backend_version' => $backend_version,
            'script_versions' => $script_versions,
            'script_version' => $script_version,
        ));
    }
}