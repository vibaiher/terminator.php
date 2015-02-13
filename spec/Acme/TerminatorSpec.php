<?php

namespace spec\Acme;

use Acme\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TerminatorSpec extends ObjectBehavior
{
    function it_can_receive_signal_of_new_target(Target $target)
    {
        // Act
        $this->newTarget($target);

        // Assert
        $this->getTargets()->shouldReturn(array($target));
    }

    function it_can_receive_signal_of_lose_target(Target $target)
    {
        // Arrage
        $this->newTarget($target);

        // Act
        $this->targetLost($target);

        // Assert
        $this->getTargets()->shouldReturn(array());
    }
}
