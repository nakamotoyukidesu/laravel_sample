<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\Ramen;


use Illuminate\Support\Facades\Log;
use rameninfo\Application\Requests\Ramen\RamenEditRequest;

final class RamenEditController
{
    public function __invoke(RamenEditRequest $request)
    {
        echo $request->ramen_id;
        dd($request);
    }
}
