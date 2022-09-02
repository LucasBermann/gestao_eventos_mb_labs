<?php
declare(strict_types=1);

namespace App\Tools\Translation;

use Exception;

class ExceptionsTranslation
{
    private static $languages = [
        'ptbr' => ExceptionsPtBr::class,
        'en' => ExceptionsEn::class,
    ];

    public static function validate(
        bool $validation,
        int $code
    ) {
        if (!$validation) {
            $exceptionLang = new self::$languages[env('LANGUAGE', 'ptbr')]();

            throw new Exception(
                $exceptionLang->getMessage($code),
                $code
            );
        }
    }
    public static function throwNow(int $code) {
        $exceptionLang = new self::$languages[env('LANGUAGE', 'ptbr')]();
        throw new Exception(
            $exceptionLang->getMessage($code),
            $code
        );
    }
    public static function getMessage(int $code) {
        $exceptionLang = new self::$languages[env('LANGUAGE', 'ptbr')]();
        return $exceptionLang->getMessage($code);
    }
}
