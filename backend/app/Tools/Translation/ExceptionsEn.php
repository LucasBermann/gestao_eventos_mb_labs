<?php
declare(strict_types=1);

namespace App\Tools\Translation;

class ExceptionsEn extends ExceptionsLang
{
    public function __construct()
    {
        parent::__construct(
            [
                789 => 'Error - Name must be provided',
                790 => 'Error - Email must be provided',
                791 => 'Error - Senha must be provided',
                792 => 'Error - User already registered',
                793 => 'Email or password is invalid',
            ]
        );
    }
}
