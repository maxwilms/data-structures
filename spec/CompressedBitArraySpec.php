<?php

namespace spec\maxwilms\DataStructures;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompressedBitArraySpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(10);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('maxwilms\DataStructures\CompressedBitArray');
    }

    function it_is_serializeable()
    {
        $this->shouldImplement('Serializable');
    }

    function it_is_deserializeable()
    {
        // set some bits
        $this->set(1);
        $this->set(4);
        $this->set(8);

        $string = serialize($this);

        $object = unserialize($string);

        $object->has(0)->shouldReturn(false);
        $object->has(1)->shouldReturn(true);
        $object->has(4)->shouldReturn(true);
        $object->has(8)->shouldReturn(true);
    }
}
