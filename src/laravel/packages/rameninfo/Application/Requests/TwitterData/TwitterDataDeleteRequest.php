<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\TwitterData;


use rameninfo\Application\Requests\ApiRequest;
use rameninfo\Application\Requests\Requests;

final class TwitterDataDeleteRequest extends ApiRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }
}
