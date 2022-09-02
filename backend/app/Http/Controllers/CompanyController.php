<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Tools\Helpers\StringFormaterHelper;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    public function createCompany(Request $request)
    {
        $name = $request->name ?? '';

        $phone = StringFormaterHelper::onlyNumbers(
            $request->phone ?? ''
        );
        $documentNumber = StringFormaterHelper::onlyNumbers(
            $request->documentNumber ?? ''
        );

        ExceptionsTranslation::validate(
            !!$name,
            Exceptions::EMPTY_COMPANY_NAME
        );
        ExceptionsTranslation::validate(
            !!$phone,
            Exceptions::EMPTY_PHONE
        );
        ExceptionsTranslation::validate(
            !!$documentNumber,
            Exceptions::EMPTY_COMPANY_DOCUMENT
        );
        ExceptionsTranslation::validate(
            StringFormaterHelper::isValidPhoneNumber($phone),
            Exceptions::INVALID_PHONE
        );
        ExceptionsTranslation::validate(
            StringFormaterHelper::isValidDocumentNumber($documentNumber),
            Exceptions::INVALID_DOCUMENT_NUMBER
        );

        $company = new Company([
            'name' => $name,
            'documentNumber' => $documentNumber,
            'phone' => $phone,
            'user_admin_id' => $request->user()->id
        ]);

        try {
            $company->save();

            //define empresa no usuário
            $userLoaded = User::where('id', $request->user()->id)->first();
            $userLoaded->company_id = $company->id;
            $userLoaded->save();
        } catch (\Illuminate\Database\QueryException $e) {
            if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                ExceptionsTranslation::throwNow(
                    Exceptions::COMPANY_ALREADY_EXISTS
                );
            }

            throw $e;
        }
    }

    public function addUserInCompany($companyId, Request $request)
    {
        $userId = $request->userId ?? '';
        $companyId = $request->companyId ?? '';//não requer valid, sempre deverá vir na url

        ExceptionsTranslation::validate(
            !!$userId,
            Exceptions::EMPTY_USER
        );

        $companyLoaded = Company::where('id', $companyId)->first();

        ExceptionsTranslation::validate(
            $request->user()->id === $companyLoaded->user_admin_id,
            Exceptions::USER_NOT_ADMIN
        );

        $userLoaded = User::where('id', $userId)->first();
        $userLoaded->company_id = $companyId;
        $userLoaded->save();
    }
}