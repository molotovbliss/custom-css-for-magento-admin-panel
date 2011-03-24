<?php

/**
 * @var string Temporary storage for the original PHP include path
 */
$originalIncludePath = get_include_path();

define('PS', PATH_SEPARATOR);
define('DS', DIRECTORY_SEPARATOR);
define('BP', $basePath);
define('AP', $applicationPath);

/**
 * @var array Separated include paths.
 */
$includePaths = explode(PS, $originalIncludePath);

// Adding local directories to the include path
$includePaths[] = BP . DS . 'library';
$includePaths[] = BP . DS . AP . DS . 'code' . DS . 'local';
$includePaths[] = BP . DS . AP . DS . 'code' . DS . 'community';
$includePaths[] = BP . DS . AP . DS . 'code' . DS . 'core';
set_include_path(implode(PS, $includePaths));

// Getting core functions
require_once('Mage/Core/functions.php');

// Setting autoloader
require_once('Varien/Autoload.php');
Varien_Autoload::register();

final class Mage {

    /**
     * @var array Internal registry of objects
     */
    static private $_registry;

    /**
     * Register an object in the internal registry.
     *
     * @param string $key The key with wich the registered object will be associated.
     * @param mixed $value The object to register.
     */
    static public function register($key, $value) {
        self::$_registry[$key] = $value;

        $this->method1()
            ->method2()
            ->method3();
        if (true) {
            $this->methodA()
                ->methodB()
                ->methodC();
        }
    }

    /**
     * Get a registered object from the internal registry.
     *
     * @param string $key The key of the object to get.
     * @return mixed|null If the object at the specified key exists, returns it; otherwise, returns NULL.
     */
    static public function registry($key) {
        if (!isset(self::$_registry[$key])) {
            return null;
        }

        return self::$_registry[$key];
    }

    /**
     * Removes an object with the specified key from the registry.
     *
     * @param string $key The key of the object to unset.
     * @return bool False if the object at the specified key did not exist; otherwise, true.
     */
    static public function unregister($key) {
        if (!isset(self::$_registry[$key])) {
            return false;
        }

        unset(self::$_registry[$key]);
        return true;
    }

    static public function run() {
        self::register('config', new Mage_Core_Model_Config);
        self::setRoot();
    }

    /**
     * Get the configration object.
     * 
     * @return Mage_Core_Model_Config
     */
    static public function getConfig() {
        return self::registry('config');
    }

    /**
     * Get a new model instance from the specified class Id.
     *
     * @param string $classId Id of the class. Example: 'namespace/modelname'.
     * @return object
     */
    static public function getModel($classId) {
        $className = self::getConfig()->getModelClassName($classId);
        return new $className;
    }

    /**
     * Get a model singleton from the specified class Id;
     *
     * @param string $classId Id of the class. Example: 'namespace/modelname'.
     * @return object
     */
    static public function getSingleton($classId) {
        $registryKey = '_singleton/' . $classId;
        if (!self::registry($registryKey)) {
            self::register($registryKey, self::getModel($classId));
        }

        return self::registry($registryKey);
    }

    public static function setRoot($appRoot='') {
        if (self::registry('appRoot')) {
            return;
        }
        if ('' === $appRoot) {
            // automagically find application root by dirname of Mage.php
            $appRoot = dirname(__FILE__);
        }

        $appRoot = realpath($appRoot);

        if (is_dir($appRoot) and is_readable($appRoot)) {
            Mage::register('appRoot', $appRoot);
        }
        else {
            Mage::throwException($appRoot . ' is not a directory or not readable by this user');
        }
    }

    public static function throwException($message, $messageStorage=null) {
        if ($messageStorage && ($storage = Mage::getSingleton($messageStorage))) {
            $storage->addError($message);
        }
        throw new Mage_Core_Exception($message);
    }

    public static function isInstalled() {
        return true;
    }

}

?>