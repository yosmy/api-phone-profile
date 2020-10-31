<?php

namespace Yosmy;

interface GatherPhone
{
    /**
     * @param string|null $user
     * @param string|null $country
     * @param string|null $prefix
     * @param string|null $number
     *
     * @return Phone|null
     */
    public function gather(
        ?string $user,
        ?string $country,
        ?string $prefix,
        ?string $number
    ): ?Phone;
}
