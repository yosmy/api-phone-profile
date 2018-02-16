<?php

namespace Yosmy\Phone;

/**
 * @di\service()
 */
class CollectUsers
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
     * @param array|null $ids
     * @param array|null $phones
     *
     * @return Users
     */
    public function collect(
        ?array $ids,
        ?array $phones
    ) {
        $criteria = [];

        if ($ids !== null) {
            $criteria['_id'] = ['$in' => $ids];
        }

        if ($phones !== null && !empty($phones)) {
            $phoneCriteria = [];
            foreach ($phones as $phone) {
                $phoneCriteria[] = [
                    'country' => $phone['country'],
                    'prefix' => $phone['prefix'],
                    'number' => $phone['number'],
                ];
            }

            $criteria['$or'] = $phoneCriteria;
        }

        $cursor = $this->manageCollection->find($criteria);

        return new Users($cursor);
    }
}
