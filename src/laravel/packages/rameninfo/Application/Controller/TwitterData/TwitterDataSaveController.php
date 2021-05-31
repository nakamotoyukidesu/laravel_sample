<?php

declare(strict_types=1);

namespace rameninfo\Application\Controller\TwitterData;


use Illuminate\Http\JsonResponse;
use rameninfo\Application\Requests\TwitterData\TwitterDataSaveRequest;
use rameninfo\Application\Usecases\TwitterData\SaveTwitterData;

final class TwitterDataSaveController
{
    public function __invoke(TwitterDataSaveRequest $request, SaveTwitterData $saveTwitterData)
    {
        $twitter_data_array = [];
        foreach ($request->saveTwitterData() as $twitterDatum){
            $twitter_data_array[$twitterDatum["ramen_id"]->ramen_id()->value()] = [
                "twitter_data" => $saveTwitterData($twitterDatum)
            ];
        }
    }
    public function response(array $twitter_data) : JsonResponse
    {
        $twitter_data_array = [];
        foreach ($twitter_data as $twitter_datum)
        {
            $twitter_data_array[$twitter_datum["twitter_data"]->ramen_id()->value()] =
                [
                    "twitter_data" => [
                        "ramen_id" => $twitter_datum["twitter_data"]->ramen_id()->value(),
                        "twitter_id" => $twitter_datum["twitter_data"]->twitter_id()->value(),
                        "search_query" => $twitter_datum["twitter_data"]->query()->value(),
                        "account_name" => $twitter_datum["twitter_data"]->account_name()->value()
                    ]
                ];
        }
        return response()->json($twitter_data_array);
    }
}
