<?php


class Version extends CActiveRecord
{


    public $id;
    public $code;
    public $create;
    public $log;
    public $modules;
    public $status;


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tbl_version';
    }


    public function primaryKey()
    {
        return 'id';
    }
}