<?php

namespace App\MyClasses;

class PowerMyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'No ID...';
    private $data = ['Bench Press', 'Squat', 'Leg Press', 'Shoulder Press', 'Deaf Lift'];

    function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }

    public function setId($id)
    {
        if ($id >= 0 && $id < count($this->data))
        {
            $this->id = $id;
            $this->msg = "Du magst " . $this->data[$id] . " als Nummer " . $this->id . ".";
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

    public function setData($data)
    {
        $this->data = $data;
    }

    public function alldata()
    {
        return $this->data;
    }
}
