<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Acl\Adapter\Memory;

use Phalcon\Cli\Task;

class AclcacheTask extends Task
{
    public function mainAction()
    {
        $acl = new Memory();

        $acl->addRole('manager');
        $acl->addRole('admin');
        $acl->addRole('user');
        $acl->addRole('');

        $acl->addComponent(
            '',
            [
                '',
            ]
        );

        $acl->addComponent(
            'add',
            [
                'allow',
                'contaction',
                'index',
                'role'
            ]
        );

        $acl->addComponent(
            'index',
            [
                'index'
            ]
        );

        $acl->addComponent(
            'order',
            [
                '',
                'add',
                'list',
                'index'
            ]
        );

        $acl->addComponent(
            'signup',
            [
                'index',
            ]
        );

        $acl->addComponent(
            'setting',
            [
                'index',
            ]
        );

        $acl->addComponent(
            'product',
            [
                '',
                'index',
                'add',
                'list'
            ]
        );

        $acl->allow('*', '', '');
        $acl->allow('admin', '*', '*');
        $acl->allow('manager', '*', '*');
        $acl->deny('manager', 'add', '*');
        $acl->allow('user', 'index', '*');
        $acl->allow('user', 'signup', '*');
        $acl->allow('', 'signup', '*');
        $acl->allow('user', 'product', ['','index']);
        $acl->allow('user', 'order', ['','index']);

        $this->cache->set('name', serialize($acl));
    }
    public function deleteAction()
    {
        $pointer = scandir(BASE_PATH.'/src/storage/ph-strm/na');
        unlink($pointer);

    }

}