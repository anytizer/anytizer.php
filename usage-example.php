<?php
namespace test;

/**
 * Usage example for composer based installation
 */
if(is_file("vendor/anytizer/anytizer/autoload.php"))
{
	# require_once("vendor/autoload.php");
	require_once("vendor/anytizer/anytizer/autoload.php");
}
else
{
	# Load from current installation
	# throw new Exception("anytizer not loaded.");
	require_once("autoload.php");
}

use common\validation_rules;

$validation_rules = new validation_rules("Raw Phone: 000-000-0000");
# print_r($vr);

echo "Phone Number: ", $validation_rules->phone;
