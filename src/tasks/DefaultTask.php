<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

session_start();

class DefaultTask extends Task
{
    public function mainAction($stock, $price)
    {
        $_SESSION['stock'] = $stock;
        $_SESSION['price'] = $price;
        if ($_SESSION['stock'] && $_SESSION['price']) {
            echo "Value Updated Successfully";
        } else {
            echo "Error";
        }
    }
}
