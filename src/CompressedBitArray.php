<?php

namespace maxwilms\DataStructures;

class CompressedBitArray extends BitArray implements \Serializable
{

    public function serialize()
    {
        return serialize([
            $this->length,
            gzdeflate($this->data),
        ]);
    }

    public function unserialize($serialized)
    {
        list($this->length, $data) = unserialize($serialized);
        $this->data = gzinflate($data);
    }

}
