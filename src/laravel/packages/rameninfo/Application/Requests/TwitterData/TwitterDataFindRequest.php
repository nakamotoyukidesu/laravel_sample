<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\TwitterData;


use Illuminate\Foundation\Http\FormRequest;
use rameninfo\Application\Requests\ApiRequest;
use rameninfo\Application\Requests\Requests;

final class TwitterDataFindRequest extends ApiRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }
}
