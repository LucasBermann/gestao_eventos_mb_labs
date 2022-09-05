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
                Exceptions::UNAUTHENTICATED => 'Desconectado - Faça o login para continuar',
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
                Exceptions::EVENT_NOT_SELECTED => 'Erro - Evento não selecionado',
                Exceptions::EMPTY_PAYMENT => 'Erro - Dados do pagamento não informados',
                Exceptions::PAYMENT_CARD_NUMBER => 'Erro - Número do cartão não informado',
                Exceptions::PAYMENT_HOLDER => 'Erro - Nome do titular do cartão não informado',
                Exceptions::PAYMENT_EXPIRATION => 'Erro - Data de vencimento do cartão não informada',
                Exceptions::PAYMENT_SECURITY_CODE => 'Erro - Cvv não informado',
                Exceptions::PAYMENT_CARD_NUMBER_INVALID => 'Erro - Número do cartão inválido',
                Exceptions::TICKETS_SOLD_OUT => 'Erro - Ingressos esgotados!',
                Exceptions::INCOMPATIBLE_AGE => 'Erro - Idade incompatível com o evento!',
                Exceptions::USER_ALREADY_LINKED => 'Erro - Você já comprou ingresso para este evento!',
                Exceptions::EVENT_DATE_LASS_THAN_CURRENT => 'Erro - Data/Hora do evento deve ser maior que a data/hora atual!',
                Exceptions::OLD_EVENT => 'Erro - Este evento já expirou!',
                Exceptions::USER_NOT_LINKED => 'Erro - Usuário não vinculado à empresa!',
                Exceptions::PWD_NOT_MATCH => 'Erro - As senhas informadas não são iguais!',
                Exceptions::PWD_NOT_SECURE => 'Erro - A senha precisa ter pelo menos 6 digitos!',
                Exceptions::BIRTH_DATE_INVALID => 'Erro - A data de nascimento deve ser menor que a data atual!',
            ]
        );
    }
}
