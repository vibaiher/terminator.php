<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Target;
use Acme\Routine;
use Acme\Legs;

class TerminatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Terminator');
    }

    function it_can_receive_signal_of_new_target(Target $target)
    {
        $this->addNewTarget($target);
        $this->getTargets()->shouldReturn(array($target));

    }


    function it_can_receive_signal_of_lose_target(Target $target)
    {
        $this->addNewTarget($target);
        $this->loseTarget($target);
        $this->getTargets()->shouldReturn(array());

    }

    function it_moves_to_a_target(Target $target, Legs $legs, Routine $routine)
    {
        $legs->beADoubleOf('Acme\Legs');
        $routine->beADoubleOf('Acme\Routine');
        $routine->beConstructedWith([$legs]);
        $target->beADoubleOf('Acme\Target');

        $this->addRoutine($routine);
        $legs->move($target)->shouldBeCalled();
        $this->addNewTarget($target);

    }
}
