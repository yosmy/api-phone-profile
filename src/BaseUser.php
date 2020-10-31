<?php

namespace Yosmy\Phone;

use Yosmy\Mongo;

class BaseUser extends Mongo\Document
{
    /**
     * @param string $id
     * @param string $country
     * @param string $prefix
     * @param string $number
     */
    public function __construct(
        string $id,
        string $country,
        string $prefix,
        string $number
    ) {
        parent::__construct([
            'id' => $id,
            'country' => $country,
            'prefix' => $prefix,
            'number' => $number,
        ]);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->offsetGet('id');
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->offsetGet('country');
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->offsetGet('prefix');
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->offsetGet('number');
    }

    /**
     * {@inheritdoc}
     */
    public function bsonUnserialize(array $data)
    {
        $data['id'] = $data['_id'];
        unset($data['_id']);

        parent::bsonUnserialize($data);
    }
}
