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

$data = new sanitize("Raw Phone: 000-000-0000");
echo "Phone Number: ", $data->phone;
