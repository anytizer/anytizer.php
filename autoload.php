<?php
define("__ANYTIZER_ROOT__", realpath(dirname(__FILE__))); // self dir
require_once(__ANYTIZER_ROOT__."/src/libraries/classes/backend/class.spl_include.inc.php");

use backend\spl_include;
use common\validation_rules;

spl_autoload_register(array(new spl_include(__ANYTIZER_ROOT__."/src/libraries/classes"), "namespaced_inc_dot"));
