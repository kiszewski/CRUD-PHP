<?php


define('CONTROLLERS_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('MODELS_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEWS_PATH', realpath(dirname(__FILE__) . '/../views'));


require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/validator.php'));
require_once(realpath(MODELS_PATH . '/User.php'));