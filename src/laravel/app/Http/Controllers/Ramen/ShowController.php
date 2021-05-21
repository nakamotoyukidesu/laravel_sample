<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ramen;

use rameninfo\Infrastructure\Eloquent\EloquentRamen;

final class ShowController
{
    public function __invoke()
    {
        $ramen_array = [];
        $n = 0;
        $ramen_data = EloquentRamen::all();
        foreach ($ramen_data as $data)
        {
            if($data->twitter_data != null){
                $ramen_array[$n] = [
                    "ramen_id" => $data->ramen_id,
                    "name" => $data->name,
                    "category" => $data->category,
                    "image_url" => $data->image_url,
                    "address" => $data->address,
                    "search_query" => $data->twitter_data->query,
                    "account_name" => $data->twitter_data->account_name,
                    "twitter_id" => $data->twitter_data->twitter_id
                ];
            }else{
                $ramen_array[$n] = [
                    "ramen_id" => $data->ramen_id,
                    "name" => $data->name,
                    "category" => $data->category,
                    "image_url" => $data->image_url,
                    "address" => $data->address,
                    "search_query" => "ツイッター情報が保存されていません",
                    "account_name" => "ツイッター情報が保存されていません",
                    "twitter_id" => "ツイッター情報が保存されていません"
                ];
            }
            $n += 1;
        }
        return view("ramen.show",compact('ramen_array'));
    }
}
