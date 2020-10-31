<?php

namespace Yosmy;

/**
 * @di\service()
 */
class DeletePhone
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
     */
    public function delete(
        string $user
    ) {
        $this->manageCollection->deleteOne(
            [
                '_id' => $user
            ]
        );
    }
}
