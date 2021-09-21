<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\Ramen;



use ArrayObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use rameninfo\Application\Requests\Ramen\RamenSaveRequest;
use rameninfo\Application\Usecases\Ramen\SaveRamen;
use rameninfo\Application\Usecases\TwitterData\SaveTwitterData;
use rameninfo\Domain\Models\Ramen\Ramen;
use rameninfo\Domain\Models\TwitterData\TwitterData;

final class RamenSaveController
{
    public function __invoke(RamenSaveRequest $request, SaveRamen $saveRamen, SaveTwitterData $saveTwitterData): JsonResponse
    {
        $ramens = [];
        foreach ($request->saveRamen() as $ramen){
            if(is_null($ramen["twitter_data"])){
                $ramens[$ramen["ramen_data"]->ramen_id()->value()] = [
                    "ramen_data" => $saveRamen($ramen["ramen_data"]),
                    "twitter_data" => null
                ];
            }else{
                $ramens[$ramen["ramen_data"]->ramen_id()->value()] = [
                    "ramen_data" => $saveRamen($ramen["ramen_data"]),
                    "twitter_data" => $saveTwitterData($ramen["twitter_data"])
                ];
            }
        }
        return $this->response($ramens);
    }

    public function response(array $ramens) : JsonResponse
    {
        $ramen_array = [];
        foreach ($ramens as $ramen)
        {
            if(is_null($ramen["twitter_data"])){
                $ramen_array[$ramen["ramen_data"]->ramen_id()->value()] =
                    [
                        "ramen_data" => [
                            'ramen_id' => $ramen["ramen_data"]->ramen_id()->value(),
                            'name' => $ramen["ramen_data"]->name()->value(),
                            'category' => $ramen["ramen_data"]->category()->value(),
                            'image_url' => $ramen["ramen_data"]->image_url()->value(),
                            'address' => $ramen["ramen_data"]->address()->value(),
                        ],
                        "twitter_data" => "何も値が入っていません"
                    ];
            }else{
                $ramen_array[$ramen["ramen_data"]->ramen_id()->value()] =
                    [
                        "ramen_data" => [
                            'ramen_id' => $ramen["ramen_data"]->ramen_id()->value(),
                            'name' => $ramen["ramen_data"]->name()->value(),
                            'category' => $ramen["ramen_data"]->category()->value(),
                            'image_url' => $ramen["ramen_data"]->image_url()->value(),
                            'address' => $ramen["ramen_data"]->address()->value(),
                        ],
                        "twitter_data" => [
                            "ramen_id" => $ramen["twitter_data"]->ramen_id()->value(),
                            "twitter_id" => $ramen["twitter_data"]->twitter_id()->value(),
                            "search_query" => $ramen["twitter_data"]->query()->value(),
                            "account_name" => $ramen["twitter_data"]->account_name()->value()
                        ]
                    ];
            }
        }
        $array = [
            "ramens" => $ramen_array
            ];
        return response()->json($array);
    }



}
