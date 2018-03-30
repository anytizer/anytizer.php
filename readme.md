# anytizer.php

Input sanitizer library for PHP. Similar to property access as in C# .net.
This tries to extract the value from the user input into the format given.

Usage Example:

    require_once "vendor/autoload.php"
    use anytizer\sanitize;
    
    $phone = (new sanitize($_POST["phone"]))->phone;


## Validations

It supports different kinds of validations as defined in `_rule_NAME()` where `NAME` is your validation name. See class file: class.validation_rules.inc.php. You can add your own method to expand the feature.


### Numeric

  - Phone Number
  - Digits
  - Money (incomplete)


### Addressing

  - Postal Codes
  - Full Name
  - Email (incomplete)


### Decisions

  - Y/N (Yes, No)
  - Boolean


### Others

  - Date, Time (incomplete)


## Installation

    composer require anytizer/anytizer.php:dev-master


### Notes

	Work in progress.
	Do not use in production environment.
