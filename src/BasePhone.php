<?php

namespace Yosmy;

use Yosmy\Mongo;

class BasePhone extends Mongo\Document implements Phone
{
    /**
     * @param string $user
     * @param string $country
     * @param string $prefix
     * @param string $number
     */
    public function __construct(
        string $user,
        string $country,
        string $prefix,
        string $number
    ) {
        parent::__construct([
            '_id' => $user,
            'country' => $country,
            'prefix' => $prefix,
            'number' => $number,
        ]);
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->offsetGet('_id');
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
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->user = $data->_id;

        unset($data->_id);

        return $data;
    }
}
