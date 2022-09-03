<?php
declare(strict_types=1);

namespace App\Tools\Translation;

class Exceptions
{
    const DEFAULT_ERROR = 444;
    const USER_EMPTY_NAME = 789;
    const USER_EMPTY_EMAIL = 790;
    const USER_EMPTY_PASSWORD = 791;
    const USER_ALREADY_EXISTS = 792;
    const UNAUTHORIZED = 793;
    const EMPTY_COMPANY_NAME = 794;
    const EMPTY_PHONE = 795;
    const EMPTY_COMPANY_DOCUMENT = 796;
    const COMPANY_ALREADY_EXISTS = 797;
    const INVALID_PHONE = 798;
    const INVALID_DOCUMENT_NUMBER = 799;
    const EMPTY_BIRTH = 800;
    const EMPTY_USER = 801;
    const USER_NOT_ADMIN = 802;
    const EMPTY_EVENT_DESCRIPTION = 803;
    const EMPTY_EVENT_CATEGORY = 804;
    const EMPTY_EVENT_LOCATION = 805;
    const EMPTY_EVENT_DATE_TIME = 806;
    const EMPTY_EVENT_PARTIC_LIMIT = 807;
    const USER_WITHOUT_COMPANY = 808;
}
