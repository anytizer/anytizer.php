# anytizer.php

Input sanitizer library for PHP. Similar to property access as in C# .net.
This tries to extract the value from the user input into the format given.

Usage Example:

    require_once "vendor/autoload.php"
    use anytizer\sanitize;
    
    $phone = (new sanitize($_POST["phone"]))->phone;


## List of access types

On a variable, you can apply the following access types:

- ->upper
- ->lower
- ->digits
- ->money
- ->username
- ->fullname
- ->text
- ->phone
- ->date
- ->datetime
- ->now
- ->salt
- ->email
- ->postalcode
- ->code
- ->yn
- ->boolean




## Validations

It supports different kinds of validations as defined in `_rule_NAME()` where `NAME` is your validation name. See class file: [sanitize.php](src/anytizer/sanitize.php). You can add your own method to expand the feature.


### Numeric

  - Phone Number
  - Digits
  - Money (incomplete: Rounds the amount)


### Addressing

  - Postal Codes
  - Full Name
  - Email (incomplete)


### Decisions

  - Y/N (Yes, No)
  - Boolean


### Others

  - Date, Time (incomplete), Date Time, Now
  - Salt


## Installation

    composer require anytizer/anytizer.php:dev-master


### Notes

	Work in progress.
	Do not use in production environment.
  Embedded in DTO.php project.
