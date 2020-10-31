<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BaseAddPhone implements AddPhone
{
    /**
     * @var NormalizePhone
     */
    private $normalizePhone;

    /**
     * @var ManagePhoneCollection
     */
    private $manageCollection;

    /**
     * @param NormalizePhone        $normalizePhone
     * @param ManagePhoneCollection $manageCollection
     */
    public function __construct(
        NormalizePhone $normalizePhone,
        ManagePhoneCollection $manageCollection
    ) {
        $this->normalizePhone = $normalizePhone;
        $this->manageCollection = $manageCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function add(
        string $user,
        string $country,
        string $prefix,
        string $number
    ) {
        $this->manageCollection->insertOne([
            '_id' => $user,
            'country' => $country,
            'prefix' => $prefix,
            'number' => $number
        ]);
    }
}