<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller {
    public function index()
    {
        return Event::all();
    }

    public function show($id)
    {
        return Event::where('id', $id)->first();
    }

    public function createEvent(Request $request)
    {
        $description = $request->description ?? '';
        $category = $request->category ?? '';
        $location = $request->location ?? '';
        $eventDateTime = $request->eventDateTime ?? '';
        $participantsLimit = $request->participantsLimit ?? '';
        $price = $request->price ?? 0;
        $ageMin = $request->ageMin ?? 0;

        ExceptionsTranslation::validate(
            !!$description,
            Exceptions::EMPTY_EVENT_DESCRIPTION
        );
        ExceptionsTranslation::validate(
            !!$category,
            Exceptions::EMPTY_EVENT_CATEGORY
        );
        ExceptionsTranslation::validate(
            !!$location,
            Exceptions::EMPTY_EVENT_LOCATION
        );
        ExceptionsTranslation::validate(
            !!$eventDateTime,
            Exceptions::EMPTY_EVENT_DATE_TIME
        );
        ExceptionsTranslation::validate(
            !!$participantsLimit,
            Exceptions::EMPTY_EVENT_PARTIC_LIMIT
        );
        ExceptionsTranslation::validate(
            !!$request->user()->company_id,
            Exceptions::USER_WITHOUT_COMPANY
        );

        $event = new Event([
            'description' => $description,
            'category' => $category,
            'location' => $location,
            'eventDateTime' => new Carbon($eventDateTime),
            'participantsLimit' => $participantsLimit,
            'price' => $price,
            'ageMin' => $ageMin,
            'user_registration_id' => $request->user()->id,
            'company_id' => $request->user()->company_id,
        ]);
        $event->save();
    }
}