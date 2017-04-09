# anytizer.php

Input sanitizer library for PHP. Similar property access like .net properties. This tries to extract the value from the user input into the format available.

Usage Example:

    <?php
    $phone = (new validation_rule("000-000-0000"))->phone;
    $phone = (new validation_rule($_POST["phone"]))->phone;

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
    - `composer require anytizer/anytizer`
    - `composer --dev require anytizer/anytizer": "dev-master"`

### Notes
      Not all portion of the work might have been completed.
