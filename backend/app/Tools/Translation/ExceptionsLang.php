<?php
declare(strict_types=1);

namespace App\Tools\Translation;

class ExceptionsLang
{
    protected $msgs = [];

    public function __construct($msgs)
    {
        $this->msgs = $msgs;
    }

    public function getMessage(int $code)
    {
        return $this->msgs[$code];
    }
}
