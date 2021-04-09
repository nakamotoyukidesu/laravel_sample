<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests;

interface Requests
{
    /**
     * @return array
     */
    public function rules() :array;
}
