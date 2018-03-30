<?php
namespace anytizer;

/**
 * Generic all kinds of validations, used in server side validation process.
 *
 * Class validation_rules
 * @package common
 */
class sanitize
{
    private $value;

    public function __construct($value)
    {
        $this->value = trim($value);
    }

    /**
     * Converts a user data into proper format
     *
     * Do NOT type-hint return type due to different types are possible
     *
     * @example $clean = (new sanitize($dirty))->postalcode;
     * @example $clean = (new sanitize($dirty))->fullname;
     * @example $clean = (new sanitize($dirty))->email;
     * @example $clean = (new sanitize($dirty))->money;
     * @example $clean = (new sanitize($dirty))->phone;
     * @example $clean = (new sanitize($dirty))->digits;
     * @example $clean = (new sanitize($dirty))->boolean;
     *
     * @param string $name
     * @return mixed|string|boolean
     */
    public function __get(string $name)
    {
        $output = "";
        $method = "_rule_{$name}";

        if(method_exists($this, $method))
        {
            $output = call_user_func(array($this, $method), null);
        }

        return $output;
    }

    /**
     * Upper case
     * @return string
     */
    private function _rule_upper(): string
    {
        return strtoupper($this->value);
    }

    /**
     * Lower case
     * @return string
     */
    private function _rule_lower(): string
    {
        return strtolower($this->value);
    }

    /**
     * Digits only
     * @return mixed
     */
    private function _rule_digits(): string
    {
        $digits = preg_replace("/[^0-9]/is", "", $this->value);
        return $digits;
    }

    /**
     * Alphabets, numerals etc. only as username
     * @return mixed
     */
    private function _rule_username(): string
    {
        $username = preg_replace("/[^a-zA-Z0-9\@\.\-\_]/is", "", $this->value);
        return $username;
    }

    /**
     * Full Name in plain English
     * @todo Handle cliches', umlauts, utf, unicode characters
     *
     * @return string
     */
    private function _rule_fullname(): string
    {
        $fullname = strtolower($this->value);
        $fullname = preg_replace("/[^\\.\\-\\ a-zA-Z]/is", "", $fullname);
        $fullname = trim($fullname);
        $fullname = preg_replace("/\\s+/is", " ", $fullname); // remove spaces
        $names = preg_split("/[\\ ]/is", $fullname); // wordify
        $names = array_map("ucfirst", $names); // ucfirst
        $fullname = implode(" ", $names); // back

        return $fullname;
    }

    /**
     * Phone Number
     * @return mixed|string
     */
    private function _rule_phone(): string
    {
        $phonenumber = $this->value;

        $phonenumber = preg_replace("/[^\\+0-9]/is", "", $phonenumber);
        if(strlen($phonenumber))
        {
            $has_plus_sign = $phonenumber[0]=="+"; // first is +
            $phonenumber = ($has_plus_sign?"+":"").preg_replace("/[^0-9]/is", "", $phonenumber);
        }

        return $phonenumber;
    }

    /**
     * @todo Convert to Double as well
     * @todo Use Money Format
     * @todo Prevent digits change in last position - while fixing/rounding
     * @todo Non-functional due to floating points
     * @see http://php.net/manual/en/function.money-format.php
     * @see http://floating-point-gui.de/languages/php/
     * @return float
     */
    private function _rule_money(): float
    {
        $money = $this->value;

        $money = (float)preg_replace("/[^0-9\\.]/is", "", $money);
        // $money = round($money, 2); // works, but likely to change the last digits
        $money = number_format($money, 2, ".", ""); // has too many floating points
        // $money = preg_replace("/([0-9]{1,})\\.([0-9]{2})(.*?)$/is", "\$1.\$2", $money);

        // Auto parsed to float due to return type typed in as hint
        return $money;
    }

    /**
     * Email format
     * @return string
     */
    private function _rule_email(): string
    {
        $email = $this->value;

        $email = preg_replace("/[\\s]/is", "", $email);
        $email = preg_replace("/[^\\@a-zA-Z0-9\\.\\-\\_]/is", "", $email);

        return $email;
    }

    /**
     * Postal Code
     * @return string
     */
    private function _rule_postalcode(): string
    {
        $postalcode = strtoupper($this->value);
        if(strlen($postalcode))
        {
            $postalcode = preg_replace("/[^A-Z0-9]/is", "", $postalcode);
            $postalcode = preg_replace("/^([A-Z0-9]{3})?(.*?)$/", "\$1 \$2", $postalcode);
        }

        return $postalcode;
    }

    /**
     * Yes "Y" or "N" for enumerated boolean decisions
     *
     * @return string
     */
    private function _rule_yn(): string
    {
        $yn = "N";

        $yesno = strtoupper($this->value);
        switch($yesno)
        {
            case "Y":
            case "YES":
                $yn = "Y";
                break;
            case "N":
            case "NO":
                $yn = "N";
                break;
            default:
                // error
                break;
        }

        return $yn;
    }

    /**
     * true/false Boolean
     *
     * @return bool
     */
    private function _rule_boolean(): bool
    {
        $boolean = false;

        $input = strtoupper($this->value);
        switch($input)
        {
            case "T":
            case "Y":
            case "YES":
            case "TRUE":
                $boolean = true;
                break;
        }

        return $boolean;
    }
}