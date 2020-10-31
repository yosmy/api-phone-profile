<?php

namespace Yosmy\Phone;

interface GatherUser
{
    /**
     * @param string $id
     *
     * @return User
     */
    /**
     * @param string|null $id
     * @param string|null $country
     * @param string|null $prefix
     * @param string|null $number
     *
     * @return User
     */
    public function gather(
        ?string $id,
        ?string $country,
        ?string $prefix,
        ?string $number
    );
}
