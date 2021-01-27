<?php
namespace App\MyClasses;

use PhpParser\Builder\Class_;

Class MyService
{
    private $msg;
    private $data;

    public function __construct()
    {
        $this->msg = 'Hello, this is MyService.';
        $this->data = ['Hello', 'Welcome', 'Bye'];
    }

    public function say()
    {
        return $this->msg;
    }

    public function data()
    {
        return $this->data;
    }
}
