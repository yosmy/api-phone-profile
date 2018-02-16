<?php

namespace Yosmy\Phone;

use Yosmy\Mongo;

class Users extends Mongo\Cursor
{
    /**
     * @var User[]
     */
    protected $cursor;
}

