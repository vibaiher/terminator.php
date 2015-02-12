<?php

namespace Acme;
use Acme\Legs;

class Routine
{
    private $legs;

    public function __construct(Legs $legs){
      $this->legs = $legs;
    }

    public function process(Target $target){
        $this->legs->move($target);
    }
}
