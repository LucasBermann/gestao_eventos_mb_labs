<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventParticipation;
use App\Tools\Helpers\PaymentHelper;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Illuminate\Http\Request;

class EventParticipationController extends Controller {
    public function index()
    {
        return EventParticipation::all();
    }

    public function show($id)
    {
        return EventParticipation::where('id', $id)->first();
    }

    public function createEventParticipation(Request $request)
    {
        $event_id = $request->event_id ?? '';
        $isHalfPrice = $request->isHalfPrice ?? false;
        $payment = $request->payment ?? null;

        ExceptionsTranslation::validate(
            !!$event_id,
            Exceptions::EVENT_NOT_SELECTED
        );
        ExceptionsTranslation::validate(
            !!$payment,
            Exceptions::EMPTY_PAYMENT
        );

        $idTransaction = PaymentHelper::payWithCard((object)$payment);

        $eventParticipation = new EventParticipation([
            'user_id' => $request->user()->id,
            'event_id' => $event_id,
            'isHalfPrice' => $isHalfPrice,
            'paymentCard' => PaymentHelper::getFormatedCardNumber($payment['card']),
            'paymentIdTransaction' => $idTransaction,
        ]);
        $eventParticipation->save();
    }
}