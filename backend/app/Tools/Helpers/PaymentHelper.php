<?php
declare(strict_types=1);

namespace App\Tools\Helpers;

use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;

class PaymentHelper
{
    public static function payWithCard($payment)
    {
        $card = $payment->card ?? '';
        $holder = $payment->holder ?? '';
        $expiration = $payment->expiration ?? '';
        $securityCode = $payment->securityCode ?? '';

        ExceptionsTranslation::validate(
            !!$card,
            Exceptions::PAYMENT_CARD_NUMBER
        );
        ExceptionsTranslation::validate(
            StringFormaterHelper::isValidCardNumber($card),
            Exceptions::PAYMENT_CARD_NUMBER_INVALID
        );
        ExceptionsTranslation::validate(
            !!$holder,
            Exceptions::PAYMENT_HOLDER
        );
        ExceptionsTranslation::validate(
            !!$expiration,
            Exceptions::PAYMENT_EXPIRATION
        );
        ExceptionsTranslation::validate(
            !!$securityCode,
            Exceptions::PAYMENT_SECURITY_CODE
        );

        return self::payCredit($card, $holder, $expiration, $securityCode);
    }

    private static function payCredit()
    {
        //Aqui é simulada a integração com api de pagamentos

        //retorna id de pagamento (integração)
        return 'abc123';
    }

    public static function getFormatedCardNumber($cardNumber)
    {
        return '**** **** **** ' . substr($cardNumber, -4);
    }
}
