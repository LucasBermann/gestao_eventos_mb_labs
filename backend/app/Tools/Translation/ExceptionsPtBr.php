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
            ]
        );
    }
}
