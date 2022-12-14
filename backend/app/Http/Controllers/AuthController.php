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
        $credentials = [
            'email' => $request->email ?? '',
            'password' => $request->password ?? ''
        ];

        ExceptionsTranslation::validate(
            !!$credentials['email'],
            Exceptions::USER_EMPTY_EMAIL
        );
        ExceptionsTranslation::validate(
            !!$credentials['password'],
            Exceptions::USER_EMPTY_PASSWORD
        );

        if (Auth::attempt($credentials)) {
            $user = User::query()->where('email', '=', $request->email)->with('company')->get()->first();
            $token = $user->createToken('login'. $request->email);

            return [
                'token' => explode('|', $token->plainTextToken)[1],
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'birth' => $user->birth,
                'company_id' => $user->company_id,
                'company' => $user->company
            ];
        }

        throw new UnauthorizedHttpException(
            '',
            ExceptionsTranslation::getMessage(
                Exceptions::UNAUTHORIZED
            ),
            null,
            Exceptions::UNAUTHORIZED
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        auth('web')->logout();
    }
}
