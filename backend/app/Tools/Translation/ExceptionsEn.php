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
                Exceptions::UNAUTHENTICATED => 'Disconnected - Please login to continue',
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
                Exceptions::EMPTY_EVENT_DESCRIPTION => 'Error - Event description must be provided',
                Exceptions::EMPTY_EVENT_CATEGORY => 'Error - Event category must be provided',
                Exceptions::EMPTY_EVENT_LOCATION => 'Error - Event location must be provided',
                Exceptions::EMPTY_EVENT_DATE_TIME => 'Error - Event date and time must be provided',
                Exceptions::EMPTY_EVENT_PARTIC_LIMIT => 'Error - Participants limit must be provided',
                Exceptions::USER_WITHOUT_COMPANY => 'Error - User does not belong to any company',
                Exceptions::EVENT_NOT_SELECTED => 'Error - Event not selected',
                Exceptions::EMPTY_PAYMENT => 'Error - Payment details must be provided',
                Exceptions::PAYMENT_CARD_NUMBER=> 'Error - Card number must be provided',
                Exceptions::PAYMENT_HOLDER => 'Error - Card holder must be provided',
                Exceptions::PAYMENT_EXPIRATION => 'Error - Expiration date must be provided',
                Exceptions::PAYMENT_SECURITY_CODE => 'Error - Security code must be provided',
                Exceptions::PAYMENT_CARD_NUMBER_INVALID => 'Error - Invalid card number',
                Exceptions::TICKETS_SOLD_OUT => 'Error - Tickets are sold out!',
                Exceptions::INCOMPATIBLE_AGE => 'Error - age incompatible with the event!',
                Exceptions::USER_ALREADY_LINKED => 'Error - You have already purchased tickets for this event!',
                Exceptions::EVENT_DATE_LASS_THAN_CURRENT => 'Error - Event date less than current date!',
                Exceptions::OLD_EVENT => 'This event has already expired!',
                Exceptions::USER_NOT_LINKED => 'Error - Unlinked user!',
                Exceptions::PWD_NOT_MATCH => 'Error - As senhas informadas não são iguais!',
                Exceptions::PWD_NOT_SECURE => 'Error - Password must be at least 6 digits long!',
                Exceptions::BIRTH_DATE_INVALID => 'Error - The date of birth must be less than the current date!',
            ]
        );
    }
}
