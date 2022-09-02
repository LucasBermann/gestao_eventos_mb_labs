<?php
declare(strict_types=1);

namespace App\Tools\Translation;

class ExceptionsPtBr extends ExceptionsLang
{
    public function __construct()
    {
        parent::__construct(
            [
                789 => 'Erro - Nome não informado',
                790 => 'Erro - Email não informado',
                791 => 'Erro - Senha não informada',
                792 => 'Erro - Usuário já cadastrado',
                793 => 'Usuário ou senha inválidos',
                794 => 'Erro - Razão social não informada',
                795 => 'Erro - Telefone não informado',
                796 => 'Erro - CNPJ não informado',
                797 => 'Erro - Empresa já cadastrada (CNPJ)',
                798 => 'Erro - Telefone Inválido',
                799 => 'Erro - CNPJ Inválido',
                800 => 'Erro - Data de nascimento não informada',
                801 => 'Erro - Deve-se selecionar um usuário',
                802 => 'Erro - Usuário não é administrador desta empresa',
            ]
        );
    }
}
