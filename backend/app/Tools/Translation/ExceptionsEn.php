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
                794 => 'Error - Company name must be provided',
                795 => 'Error - Phone number must be provided',
                796 => 'Error - Document number must be provided',
                797 => 'Error - User already registered (document number)',
                798 => 'Error - Invalid phone number',
                799 => 'Error - Document number is Invalid',
                800 => 'Error - Birth date must be provided',
                801 => 'Error - No user selected',
                802 => 'Error - User is not admin of this company',
            ]
        );
    }
}
