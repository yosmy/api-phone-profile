<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BasePickPhone implements PickPhone
{
    /**
     * @var BaseGatherPhone
     */
    private $gatherPhone;

    /**
     * @param BaseGatherPhone $gatherPhone
     */
    public function __construct(BaseGatherPhone $gatherPhone)
    {
        $this->gatherPhone = $gatherPhone;
    }

    /**
     * {@inheritDoc}
     */
    public function pick(
        ?string $user,
        ?string $country,
        ?string $prefix,
        ?string $number
    ): Phone {
        $phone = $this->gatherPhone->gather(
            $user,
            $country,
            $prefix,
            $number
        );

        if ($phone === null) {
            throw new BaseNonexistentPhoneException();
        }

        return $phone;
    }
}
