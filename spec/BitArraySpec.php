<?php

namespace spec\maxwilms\DataStructures;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BitArraySpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(10);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('maxwilms\DataStructures\BitArray');
    }

    function it_is_empty_at_construction_time()
    {
        $this->beConstructedWith(10);

        for ($i = 0; $i < 10; $i++) {
            $this->has($i)->shouldReturn(false);
        }
    }

    function it_stores_a_bit()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->has($i)->shouldReturn(false);
            $this->set($i);
            $this->has($i)->shouldReturn(true);
        }
    }

    function it_prevents_wrong_settings()
    {
        $this->shouldThrow('OutOfBoundsException')->duringSet(-1);
        $this->shouldThrow('OutOfBoundsException')->duringSet(10);
        $this->shouldThrow('OutOfBoundsException')->duringSet(4.1);
    }

    function it_prevents_wrong_readings()
    {
        $this->shouldThrow('OutOfBoundsException')->duringHas(-1);
        $this->shouldThrow('OutOfBoundsException')->duringHas(10);
        $this->shouldThrow('OutOfBoundsException')->duringHas(4.1);
    }



}
