<?php

namespace Yosmy\Phone;

/**
 * @di\service()
 */
class BaseGatherUser implements GatherUser
{
    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(ManageUserCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function gather(
        ?string $id,
        ?string $country,
        ?string $prefix,
        ?string $number
    ) {
        $criteria = [];
        
        if ($id !== null) {
            $criteria['_id'] = $id;
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
        
        /** @var User $user */
        $user = $this->manageCollection->findOne($criteria);

        return $user;
    }
}
