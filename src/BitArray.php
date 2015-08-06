<?php

namespace maxwilms\DataStructures;

class BitArray
{

    protected $length;

    protected $data;

    public function __construct($length)
    {
        $this->length = $length;
        $this->data = str_repeat(chr(0), ceil($this->length / 8));
    }

    public function has($bit)
    {
        $this->guardAgainstBounds($bit);

        $index = (int)($bit / 8);

        return (ord($this->data[$index]) & (1 << $bit % 8)) === (1 << $bit % 8);
    }

    public function set($bit)
    {
        $this->guardAgainstBounds($bit);

        $index = (int)($bit / 8);

        $this->data[$index] = chr(ord($this->data[$index]) | (1 << $bit % 8));
    }

    protected function guardAgainstBounds($bit)
    {
        if ($bit < 0 || $bit >= $this->length || intval($bit) !== $bit) {
            throw new \OutOfBoundsException("You may not access a bit Array at this position");
        }
    }

}
