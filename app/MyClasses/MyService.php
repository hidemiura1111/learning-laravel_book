<?php
namespace App\MyClasses;

use PhpParser\Builder\Class_;

Class MyService implements MyServiceInterface
{
    private $serial;
    private $id = -1;
    private $msg = 'No ID...';
    private $data = ['hello', 'welcome', 'bye'];

    public function __construct(int $id = -1)
    {
        // if ($id >= 0) {
        //     $this->id = $id;
        //     $this->msg = 'select: ' . $this->data[$id];
        // }

        $this->setId($id);
        $this->serial = rand();
        echo "[" . $this->serial . "]";
    }

    public function setId($id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data))
        {
            $this->msg = "select  id: " . $id . ', data: ' . $this->data[$id];
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function alldata()
    {
        return $this->data;
    }
}
