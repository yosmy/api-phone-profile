<?php

namespace Yosmy\Phone;

/**
 * @di\service()
 */
class DeleteUser
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
     */
    public function delete(
        string $id
    ) {
        $this->manageCollection->deleteOne(
            [
                '_id' => $id
            ]
        );
    }
}
