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
        // 定义版本参数
        $subVersions = array();
        foreach (SubVersion::model()->findAll('1 order by `create` desc') as $v) {
            $subVersions[$v->type . '_versions'][$v->version] = $v->version;
        }

        return $this->render('create', $subVersions);
    }
}