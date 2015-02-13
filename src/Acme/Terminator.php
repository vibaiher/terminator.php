<?php

namespace Acme;

use Acme\Target;

class Terminator
{
    private $targets = array();

    public function newTarget(Target $target)
    {
        $this->targets[] = $target;
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
