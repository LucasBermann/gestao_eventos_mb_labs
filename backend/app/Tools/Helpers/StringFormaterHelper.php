<?php
declare(strict_types=1);

namespace App\Tools\Helpers;

class StringFormaterHelper
{
    public static function onlyNumbers(string $string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }

    public static function isValidPhoneNumber(string $phone) : bool
    {
        $phoneFormated = self::onlyNumbers($phone);
        return strlen($phoneFormated) === 11 || strlen($phoneFormated) === 10;
    }

    public static function isValidDocumentNumber(string $documentNumber) : bool
    {
        $documentNumberFormated = self::onlyNumbers($documentNumber);
        return strlen($documentNumberFormated) === 14;
    }
}
