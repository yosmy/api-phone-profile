<?php

namespace Yosmy;

use Yosmy;
use Traversable;

/**
 * @di\service()
 */
class AuditExtraPhones
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
        return $this->managePhoneCollection->aggregate(
            [
                [
                    '$lookup' => [
                        'localField' => '_id',
                        'from' => $manageCollection->getName(),
                        'as' => 'parent',
                        'foreignField' => '_id',
                    ]
                ],
                [
                    '$match' => [
                        'parent._id' => [
                            '$exists' => false
                        ]
                    ],
                ]
            ]
        );
    }
}