<?php

namespace Yosmy;

interface PickPhone
{
    /**
     * @param string|null $user
     * @param string|null $country
     * @param string|null $prefix
     * @param string|null $number
     *
     * @return Phone
     *
     * @throws NonexistentPhoneException
     */
    public function pick(
        ?string $user,
        ?string $country,
        ?string $prefix,
        ?string $number
    ): Phone;
}
