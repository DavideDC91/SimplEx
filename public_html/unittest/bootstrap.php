<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/11/15
 * Time: 17:24
 */

include_once('AutoLoader.php');
// Register the directory to your include files

include_once "../index.php";
AutoLoader::registerDirectory('../core/model');
AutoLoader::registerDirectory('../core/exception');
AutoLoader::registerDirectory('../core/control');
AutoLoader::registerDirectory('../core/utils');