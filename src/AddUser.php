<?php

namespace Yosmy\Phone;

use Yosmy\NormalizePhone;

/**
 * @di\service()
 */
class AddUser
{
    /**
     * @var NormalizePhone
     */
    private $normalizePhone;

    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param NormalizePhone       $normalizePhone
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(
        NormalizePhone $normalizePhone,
        ManageUserCollection $manageCollection
    ) {
        $this->normalizePhone = $normalizePhone;
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $id
     * @param string $country
     * @param string $prefix
     * @param string $number
     *
     * @throws User\InvalidNumberException
     */
    public function add(
        string $id,
        string $country,
        string $prefix,
        string $number
    ) {
        try {
            $phone = $this->normalizePhone->normalize(
                $country,
                $prefix,
                $number
            );
        } catch (InvalidNumberException $e) {
            throw new User\InvalidNumberException();
        }

        $this->manageCollection->insertOne([
            '_id' => $id,
            'country' => $phone->getCountry(),
            'prefix' => $phone->getPrefix(),
            'number' => $phone->getNumber()
        ]);
    }
}