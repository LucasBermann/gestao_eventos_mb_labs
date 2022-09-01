<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => ExceptionsTranslation::getMessage(
                    Exceptions::USER_EMPTY_EMAIL
                ),
                'password.required' => ExceptionsTranslation::getMessage(
                    Exceptions::USER_EMPTY_PASSWORD
                )
            ]
        );

        if (Auth::attempt($credentials)) {
            $user = User::query()->where('email', '=', $request->email)->get()->first();
            $token = $user->createToken('login'. $request->email);

            return [ 'data' => explode('|', $token->plainTextToken)[1] ];
        }

        throw new UnauthorizedHttpException(
            '',
            ExceptionsTranslation::getMessage(
                Exceptions::UNAUTHORIZED
            )
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        auth('web')->logout();
    }
}
