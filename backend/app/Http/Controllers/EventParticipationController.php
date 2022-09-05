<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipation;
use App\Tools\Helpers\PaymentHelper;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use DateTime;
use Illuminate\Http\Request;

class EventParticipationController extends Controller {
    public function index()
    {
        return EventParticipation::search(request('search', '{}'));
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

        $this->validateEventParticipation($request);

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

    private function validateEventParticipation($request)
    {
        // Validando se usuário já comprou o ingresso
        $userAlreadyLinked = EventParticipation::where('event_id', $request->event_id)
            ->where('user_id', $request->user()->id)
            ->count();
        ExceptionsTranslation::validate(
            $userAlreadyLinked === 0,
            Exceptions::USER_ALREADY_LINKED
        );

        $event = Event::where('id', $request->event_id)->first();

        // Validando idade do usuário
        $date = new DateTime($request->user()->birth);
        $resultado = $date->diff(new DateTime(date('Y-m-d')));
        $idade = (int)$resultado->format('%Y');

        ExceptionsTranslation::validate(
            $event->ageMin <= $idade,
            Exceptions::INCOMPATIBLE_AGE
        );

        $eventDate = new DateTime($event->eventDateTime);
        ExceptionsTranslation::validate(
            new DateTime(date('Y-m-d')) <= $eventDate,
            Exceptions::OLD_EVENT
        );

        // Validando se ingressos não estão esgotados
        $participationQtt = EventParticipation::where('event_id', $request->event_id)->count();
        ExceptionsTranslation::validate(
            $event->participantsLimit > $participationQtt,
            Exceptions::TICKETS_SOLD_OUT
        );
    }
}