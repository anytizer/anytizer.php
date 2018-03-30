<?php
namespace test;

/**
 * Usage example for composer based installation
 */
require_once("tests.local/vendor/autoload.php");

use anytizer\sanitize;

$data = new sanitize("Raw Phone: 000-000-0000");
echo "Phone Number: ", $data->phone;
