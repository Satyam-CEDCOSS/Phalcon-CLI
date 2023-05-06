<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class CountTask extends Task
{
    public function mainAction()
    {
        $sql = 'SELECT COUNT(*) FROM `products` WHERE stock < 10';
        $result = $this->db->fetchAll($sql);
        print_r($result[0]['COUNT(*)']);
    }
}