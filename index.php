<?php

// Error reporting
error_reporting(E_ALL | E_STRICT);

/**
 * string Path to the application folder.
 */
$applicationPath = 'application';

/**
 * srting Name of the main Mage file.
 */
$mageFileName = 'Mage.php';

/**
 * string The path to this directory.
 */
$basePath = realpath('.');


require_once($applicationPath . '/' . $mageFileName);
Mage::run();

?>