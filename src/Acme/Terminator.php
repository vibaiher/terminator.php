<?php

namespace Acme;
use Acme\Target;

class Terminator
{

    private $targets = array();

    private $routines = array();

    public function addNewTarget(Target $target)
    {
        $this->targets[] = $target;

        foreach($this->routines as $routine){
            $routine->process($target);
        }
    }

    public function getTargets()
    {
        return $this->targets;
    }

    public function loseTarget($argument1)
    {
       $this->targets = array();
    }

    public function addRoutine($routine)
    {
      $this->routines[] = $routine;
    }
}
