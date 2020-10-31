<?php

namespace Yosmy\Phone;

interface User
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @return string
     */
    public function getPrefix(): string;

    /**
     * @return string
     */
    public function getNumber(): string;
}
