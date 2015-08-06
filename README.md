PHP Data Structures
===================

Collection of Data Structures for various purposes.


Installation
------------

First install [composer](https://getcomposer.org/).

Require the data structure collection via composer:
~~~
composer require maxwilms/data-structures
~~~

Now you are ready to use it!


BitArray
--------

Data Structure to compactly store bits.

```
<?php

use maxwilms\DataSructures\BitArray;

$bitArray = new BitArray(1000); // should store 1000 bits.

$bitArray->set(3); // set a single bit

$bitArray->has(3); // true
$bitArray->has(17); // false

```