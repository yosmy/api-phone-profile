<?php

namespace Yosmy\Phone;

/**
 * @di\service()
 */
class UpdateUser
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
     * @param string $id
     * @param string $country
     * @param string $prefix
     * @param string $number
     */
    public function update(
        string $id,
        string $country,
        string $prefix,
        string $number
    ) {
        $this->manageCollection->updateOne(
            [
                '_id' => $id
            ],
            [
                '$set' => [
                    'country' => $country,
                    'prefix' => $prefix,
                    'number' => $number
                ]
            ]
        );
    }
}
