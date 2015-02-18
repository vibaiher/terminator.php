<?php
use Acme\Terminator;
use Acme\Target;
use Acme\Components\Legs;
use Acme\Routine\TranslateToTarget;
use Acme\Routine\LoseTarget;

class TerminatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function terminatorLostTarget()
    {
        //Arrange
        $terminator = new Terminator();
        $target1 = new Target();
        $target2 = new Target();

        $legs = $this->getMockBuilder('Acme\Component\Legs')
                     ->disableOriginalConstructor()->getMock();
        $translateToTarget = new TranslateToTarget($legs);
        $terminator->addRoutine($translateToTarget);
        $loseTarget = new LoseTarget();
        $terminator->addRoutine($loseTarget);
        $terminator->newTarget($target1);
        $terminator->newTarget($target2);

        //Expect
        $legs->expects($this->once())
            ->method('move')
            ->with(
                $this->equalTo($target2)
            );

        //Act
        $terminator->targetLost($target1);

    }
    /**
     * @test
     */
    public function terminatorMoves()
    {
        //Arrange
        $terminator = new Terminator();
        $target = new Target();
        $legs = $this->getMockBuilder('Acme\Component\Legs')
                     ->disableOriginalConstructor()->getMock();
        $routine = new TranslateToTarget($legs);
        $terminator->addRoutine($routine);

        //Assert
        $legs->expects($this->once())
            ->method('move')
            ->with(
                $this->equalTo($target)
            );

        //Act
        $terminator->newTarget($target);
    }
}
