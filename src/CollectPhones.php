<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectPhones
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
     * @param array|null $users
     * @param array|null $phones
     *
     * @return Phones
     */
    public function collect(
        ?array $users,
        ?array $phones
    ): Phones {
        $criteria = [];

        if ($users !== null) {
            $criteria['_id'] = ['$in' => $users];
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

        return new Phones($cursor);
    }
}
