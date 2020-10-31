<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BaseGatherPhone implements GatherPhone
{
    /**
     * @var ManagePhoneCollection
     */
    private $manageCollection;

    /**
     * @param ManagePhoneCollection $manageCollection
     */
    public function __construct(ManagePhoneCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function gather(
        ?string $user,
        ?string $country,
        ?string $prefix,
        ?string $number
    ): ?Phone {
        $criteria = [];
        
        if ($user !== null) {
            $criteria['_id'] = $user;
        }

        if ($country !== null) {
            $criteria['country'] = $country;
        }

        if ($country !== null) {
            $criteria['prefix'] = $prefix;
        }

        if ($number !== null) {
            $criteria['number'] = $number;
        }
        
        /** @var Phone $phone */
        $phone = $this->manageCollection->findOne($criteria);

        return $phone;
    }
}
