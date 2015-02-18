<?php

namespace Acme;

use Acme\Target;

class Terminator
{
    private $targets = array();
    private $routines = array();

    public function newTarget(Target $target)
    {
        $this->targets[] = $target;

        foreach($this->routines As $routine){
            $routine->process($target);
        }
    }


    public function addRoutine($routine)
    {
        $this->routines[] = $routine;
    }

    public function targetLost(Target $target)
    {
       $this->targets = array();
    }

    public function getTargets()
    {
        return $this->targets;
    }

}
