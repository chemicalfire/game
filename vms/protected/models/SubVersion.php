<?php


class SubVersion extends CActiveRecord
{

    public $type;
    public $version;
    public $create;



    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tbl_sub_version';
    }


    public function primaryKey()
    {
        return array('type', 'version');
    }
}