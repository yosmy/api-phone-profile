<?php

namespace Yosmy;

/**
 * @di\service()
 */
class UpdatePhone
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
     * @param string $user
     * @param string $country
     * @param string $prefix
     * @param string $number
     */
    public function update(
        string $user,
        string $country,
        string $prefix,
        string $number
    ) {
        $this->manageCollection->updateOne(
            [
                '_id' => $user
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
