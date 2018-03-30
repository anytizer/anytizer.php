<?php
namespace tests;

require_once("./vendor/autoload.php");
use anytizer\sanitize;

$phone = (new sanitize("000-000-0000"))->phone;
echo $phone;
