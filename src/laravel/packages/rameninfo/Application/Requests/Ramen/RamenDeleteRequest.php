<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\Ramen;


use Illuminate\Foundation\Http\FormRequest;
use rameninfo\Application\Requests\Requests;

final class RamenDeleteRequest extends FormRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }

}
