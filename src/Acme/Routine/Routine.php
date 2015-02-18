<?php
namespace Acme\Routine;

use Acme\Target;

interface Routine
{
    function process(Target $target);
}
