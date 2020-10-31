<?php

namespace Yosmy;

interface Phone
{
    /**
     * @return string
     */
    public function getUser(): string;

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
