<?php

namespace Yosmy\Phone;

/**
 * @di\service()
 */
class PickUser
{
    /**
     * @var GatherUser
     */
    private $gatherUser;

    /**
     * @param GatherUser $gatherUser
     */
    public function __construct(GatherUser $gatherUser)
    {
        $this->gatherUser = $gatherUser;
    }

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
    ) {
        $user = $this->gatherUser->gather(
            $id,
            $country,
            $prefix,
            $number
        );

        if ($user === null) {
            throw new NonexistentUserException();
        }

        return $user;
    }
}
