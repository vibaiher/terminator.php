<?php

namespace Acme\Routine;

use Acme\Target;
use Acme\Component\Legs;

class TranslateToTarget implements Routine
{
    private $legs;

    public function __construct(Legs $legs){
      $this->legs = $legs;
    }

    public function process(Target $target){
        $this->legs->move($target);
    }
}
