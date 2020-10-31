<?php

namespace Yosmy;

interface AddPhone
{
    /**
     * @param string $user
     * @param string $country
     * @param string $prefix
     * @param string $number
     */
    public function add(
        string $user,
        string $country,
        string $prefix,
        string $number
    );
}