<?php

namespace Yosmy\Phone;

interface PickUser
{
    /**
     * @param string|null $id
     * @param string|null $country
     * @param string|null $prefix
     * @param string|null $number
     *
     * @return User
     *
     * @throws NonexistentUserException
     */
    public function pick(
        ?string $id,
        ?string $country,
        ?string $prefix,
        ?string $number
    );
}
