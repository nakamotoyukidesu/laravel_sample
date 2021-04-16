<?php


namespace rameninfo\Application\Requests\Ramen;


use rameninfo\Application\Requests\ApiRequest;
use rameninfo\Application\Requests\Requests;

class RamenShowRequest  extends ApiRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }


}
