<?php

/**
 * Class core_Engine
 */
class core_Engine
{


    protected static $application;


    public static function createApplication()
    {
        if (!isset(self::$application)) {
            self::$application = new core_Application();
        }
        return self::$application;
    }
}