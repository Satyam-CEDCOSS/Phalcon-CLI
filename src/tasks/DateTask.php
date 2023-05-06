<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class DateTask extends Task
{
    public function mainAction()
    {
        $date = date('Y-m-d');
        $sql = "SELECT * FROM `orders` WHERE date = '$date'";
        $result = $this->db->fetchAll($sql);
        print_r($result[0]);
    }
}