<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class LogTask extends Task
{
    public function mainAction()
    {
        $file = scandir(BASE_PATH .'/tasks/logs');
        foreach ($file as $value) {
            if (!unlink(BASE_PATH.'/tasks/logs/'.$value)) {
                echo "$value cannot be deleted due to an error";
            } else {
                echo "$value has been deleted";
            }
        }
    }
}