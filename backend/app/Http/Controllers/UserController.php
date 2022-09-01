<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function createUser(Request $request)
    {
        $name = $request->name ?? '';
        $email = $request->email ?? '';
        $password = $request->password ?? '';

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

        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => $password,
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