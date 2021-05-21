<?php

declare(strict_types=1);

namespace rameninfo\Infrastructure\Repositories\Domain\Eloquent;


use Illuminate\Support\Facades\DB;
use rameninfo\Domain\Models\TwitterData\TwitterData;
use rameninfo\Domain\Models\TwitterData\TwitterDataRepository;
use rameninfo\Infrastructure\Eloquent\EloquentRamen;
use rameninfo\Infrastructure\Eloquent\EloquentTwitterData;

final class EloquentTwitterDataRepository implements TwitterDataRepository
{

    private $eloquentTwitterData;
    private $eloquentRamen;

    public function __construct()
    {
        $this->eloquentTwitterData = new EloquentTwitterData();
        $this->eloquentRamen = new EloquentRamen();
    }

    public function save(TwitterData $twitterData)
    {
        $this->eloquentTwitterData->create($twitterData->toArray());
    }

    public function find(string $ramen_id)
    {
        $twitter_data = EloquentTwitterData::find($ramen_id);
        return [
            'twitter_data' => [
                $ramen_id => [
                    'twitter_data' => $twitter_data,
                    'ramen_data' => $twitter_data->ramen
                ]
            ]
        ];
    }

    public function show()
    {
        $twitter_data = EloquentTwitterData::all();
        $data_array = [];
        foreach ($twitter_data as $data)
        {
            $data_array[$data->ramen_id] = [
                'twitter_data' => $data,
                'ramen_data' => $data->ramen
            ];
        }

        return [
            'twitter_data' => [
                $data_array
            ]
        ];
    }

    public function delete(string $ramenId = null)
    {
        if(!$ramenId == null){
            $data = EloquentTwitterData::find($ramenId);
            $data->delete();
            $data->ramen->delete();
        }else{
            DB::table('twitter_data')->delete();
            DB::table('ramens')->delete();
        }
        $twitter_data = EloquentTwitterData::all();
        $data_array = [];
        foreach ($twitter_data as $data)
        {
            $data_array[$data->ramen_id] = [
                $data
            ];
        }

        return [
            'twitter_data' => [
                $data_array
            ]
        ];
    }
}
