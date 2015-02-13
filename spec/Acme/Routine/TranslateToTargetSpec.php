<?php

namespace spec\Acme\Routine;

use Acme\Target;
use Acme\Component\Legs;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TranslateToTargetSpec extends ObjectBehavior
{
    function it_moves_terminator_to_a_target(Legs $legs, Target $target)
    {
        // Arrange
        $this->beConstructedWith($legs);

        // Expect
        $legs->move($target)->shouldBeCalled();

        // Act
        $this->process($target);
    }
}
