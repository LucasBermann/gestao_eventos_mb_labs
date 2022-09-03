<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::where('id', $id)->first();
    }

    public function createUser(Request $request)
    {
        $name = $request->name ?? '';
        $email = $request->email ?? '';
        $password = $request->password ?? '';
        $birth = $request->birth ?? null;
        $company_id = $request->company_id ?? null;

        ExceptionsTranslation::validate(
            !!$name,
            Exceptions::USER_EMPTY_NAME
        );
        ExceptionsTranslation::validate(
            !!$email,
            Exceptions::USER_EMPTY_EMAIL
        );
        ExceptionsTranslation::validate(
            !!$password,
            Exceptions::USER_EMPTY_PASSWORD
        );
        ExceptionsTranslation::validate(
            !!$birth,
            Exceptions::EMPTY_BIRTH
        );

        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'birth' => new Carbon($birth),
            'company_id' => $company_id,
        ]);

        try {
            $user->save();
        } catch (\Illuminate\Database\QueryException $e) {
            if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                ExceptionsTranslation::throwNow(
                    Exceptions::USER_ALREADY_EXISTS
                );
            }

            throw $e;
        }
    }
}