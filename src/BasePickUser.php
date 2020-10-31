<?php

namespace Yosmy\Phone;

/**
 * @di\service()
 */
class BasePickUser implements PickUser
{
    /**
     * @var BaseGatherUser
     */
    private $gatherUser;

    /**
     * @param BaseGatherUser $gatherUser
     */
    public function __construct(BaseGatherUser $gatherUser)
    {
        $this->gatherUser = $gatherUser;
    }

    /**
     * {@inheritDoc}
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
            throw new BaseNonexistentUserException();
        }

        return $user;
    }
}
