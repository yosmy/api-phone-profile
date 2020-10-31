<?php

namespace Yosmy;

use Yosmy;
use Traversable;

/**
 * @di\service()
 */
class AuditMissingPhones
{
    /**
     * @var ManagePhoneCollection
     */
    private $managePhoneCollection;

    /**
     * @param ManagePhoneCollection $managePhoneCollection
     */
    public function __construct(
        ManagePhoneCollection $managePhoneCollection
    ) {
        $this->managePhoneCollection = $managePhoneCollection;
    }

    /**
     * @param Yosmy\Mongo\ManageCollection $manageCollection
     *
     * @return Traversable
     */
    public function audit(
        Yosmy\Mongo\ManageCollection $manageCollection
    ): Traversable
    {
        return $manageCollection->aggregate(
            [
                [
                    '$lookup' => [
                        'localField' => '_id',
                        'from' => $this->managePhoneCollection->getName(),
                        'as' => 'phones',
                        'foreignField' => '_id',
                    ]
                ],
                [
                    '$match' => [
                        'phones._id' => [
                            '$exists' => false
                        ]
                    ],
                ]
            ]
        );
    }
}