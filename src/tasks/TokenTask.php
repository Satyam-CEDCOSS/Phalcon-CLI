<?php

declare(strict_types=1);
namespace MyApp\Tasks;

use Phalcon\Security\JWT\Builder;
use Phalcon\Security\JWT\Signer\Hmac;

use Phalcon\Cli\Task;

class TokenTask extends Task
{
    public function mainAction()
    {
        $signer  = new Hmac();
        $builder = new Builder($signer);
        $passphrase = 'QcMpZ&b&mo3TPsPk668J6QH8JA$&U&m2';

        $builder
            ->setPassphrase($passphrase)
            ->setSubject('Admin');

        $tokenObject = $builder->getToken();
        echo $tokenObject->getToken();
    }
}