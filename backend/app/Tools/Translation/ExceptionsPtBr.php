<?php
declare(strict_types=1);

namespace App\Tools\Translation;

class ExceptionsPtBr extends ExceptionsLang
{
    public function __construct()
    {
        parent::__construct(
            [
                Exceptions::DEFAULT_ERROR => 'Ops... Ocorreu um erro inesperado, favor comunicar o suporte',
                Exceptions::USER_EMPTY_NAME => 'Erro - Nome não informado',
                Exceptions::USER_EMPTY_EMAIL => 'Erro - Email não informado',
                Exceptions::USER_EMPTY_PASSWORD => 'Erro - Senha não informada',
                Exceptions::USER_ALREADY_EXISTS => 'Erro - Usuário já cadastrado',
                Exceptions::UNAUTHORIZED => 'Usuário ou senha inválidos',
                Exceptions::EMPTY_COMPANY_NAME => 'Erro - Razão social não informada',
                Exceptions::EMPTY_PHONE => 'Erro - Telefone não informado',
                Exceptions::EMPTY_COMPANY_DOCUMENT => 'Erro - CNPJ não informado',
                Exceptions::COMPANY_ALREADY_EXISTS => 'Erro - Empresa já cadastrada (CNPJ)',
                Exceptions::INVALID_PHONE => 'Erro - Telefone Inválido',
                Exceptions::INVALID_DOCUMENT_NUMBER => 'Erro - CNPJ Inválido',
                Exceptions::EMPTY_BIRTH => 'Erro - Data de nascimento não informada',
                Exceptions::EMPTY_USER => 'Erro - Deve-se selecionar um usuário',
                Exceptions::USER_NOT_ADMIN => 'Erro - Usuário não é administrador desta empresa',
                Exceptions::EMPTY_EVENT_DESCRIPTION => 'Erro - Deve-se informar uma descrição para o evento',
                Exceptions::EMPTY_EVENT_CATEGORY => 'Erro - Deve-se informar uma categoria para o evento',
                Exceptions::EMPTY_EVENT_LOCATION => 'Erro - Deve-se informar o local do evento',
                Exceptions::EMPTY_EVENT_DATE_TIME => 'Erro - Deve-se informar a data/hora para o evento',
                Exceptions::EMPTY_EVENT_PARTIC_LIMIT => 'Erro - Deve-se informar a quantidade máxima de participantes do evento',
                Exceptions::USER_WITHOUT_COMPANY => 'Erro - Usuário não vinculado a uma empresa',
            ]
        );
    }
}
