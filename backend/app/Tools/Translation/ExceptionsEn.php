<?php
declare(strict_types=1);

namespace App\Tools\Translation;

class ExceptionsEn extends ExceptionsLang
{
    public function __construct()
    {
        parent::__construct(
            [
                Exceptions::DEFAULT_ERROR => 'Unexpected error. please report to support.',
                Exceptions::USER_EMPTY_NAME => 'Error - Name must be provided',
                Exceptions::USER_EMPTY_EMAIL => 'Error - Email must be provided',
                Exceptions::USER_EMPTY_PASSWORD => 'Error - Senha must be provided',
                Exceptions::USER_ALREADY_EXISTS => 'Error - User already registered',
                Exceptions::UNAUTHORIZED => 'Email or password is invalid',
                Exceptions::EMPTY_COMPANY_NAME => 'Error - Company name must be provided',
                Exceptions::EMPTY_PHONE => 'Error - Phone number must be provided',
                Exceptions::EMPTY_COMPANY_DOCUMENT => 'Error - Document number must be provided',
                Exceptions::COMPANY_ALREADY_EXISTS => 'Error - User already registered (document number)',
                Exceptions::INVALID_PHONE => 'Error - Invalid phone number',
                Exceptions::INVALID_DOCUMENT_NUMBER => 'Error - Document number is Invalid',
                Exceptions::EMPTY_BIRTH => 'Error - Birth date must be provided',
                Exceptions::EMPTY_USER => 'Error - No user selected',
                Exceptions::USER_NOT_ADMIN => 'Error - User is not admin of this company',
                Exceptions::EMPTY_EVENT_DESCRIPTION => 'Event description must be provided',
                Exceptions::EMPTY_EVENT_CATEGORY => 'Event category must be provided',
                Exceptions::EMPTY_EVENT_LOCATION => 'Event location must be provided',
                Exceptions::EMPTY_EVENT_DATE_TIME => 'Event date and time must be provided',
                Exceptions::EMPTY_EVENT_PARTIC_LIMIT => 'Participants limit must be provided',
                Exceptions::USER_WITHOUT_COMPANY => 'User does not belong to any company',
            ]
        );
    }
}
