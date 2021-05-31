<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\Ramen;



use rameninfo\Application\Requests\ApiRequest;
use rameninfo\Application\Requests\Requests;

final class RamenEditRequest extends ApiRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }

    public function editRamen(): array
    {

    }
}
