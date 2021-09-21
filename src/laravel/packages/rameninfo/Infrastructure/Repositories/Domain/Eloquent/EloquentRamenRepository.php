<?php

declare(strict_types=1);

namespace rameninfo\Infrastructure\Repositories\Domain\Eloquent;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use rameninfo\Domain\Models\Ramen\Ramen;
use rameninfo\Domain\Models\Ramen\RamenId;
use rameninfo\Domain\Models\Ramen\RamenRepository;
use rameninfo\Domain\Models\TwitterData\TwitterData;
use rameninfo\Infrastructure\Eloquent\EloquentRamen;
use rameninfo\Infrastructure\Eloquent\EloquentTwitterData;

final class EloquentRamenRepository implements RamenRepository
{

    private $eloquentRamen;
    private $eloquentTwitterData;

    public function __construct()
    {
        $this->eloquentRamen = new EloquentRamen();
        $this->eloquentTwitterData = new EloquentTwitterData();
    }

    public function save(Ramen $ramen)
    {
        $this->eloquentRamen->create($ramen->toArray());
    }

    public function find(string $ramenId)
    {
        $ramen = EloquentRamen::find($ramenId);
        return [
            $ramenId => $ramen
        ];
    }

    public function show(string $extentions=null)
    {
        $ramens = EloquentRamen::all();
        if($extentions==null){            
            $ramen_array = [];
            foreach ($ramens as $ramen)
            {
                $ramen_array[$ramen->ramen_id] = $ramen;
            }
            return [
                'ramen_data' => [
                    $ramen_array
                ]
            ];
        }elseif($extentions=="twitter.fields"){
            $ramen_array = [];
            foreach ($ramens as $ramen)
            {
                $ramen_array[$ramen->ramen_id] = [
                    "ramen_data" => [
                        "ramen_id" => $ramen["ramen_id"],
                        "name" => $ramen["name"],
                        "category" => $ramen["image_url"],
                        "address" => $ramen["address"],
                        "created_at" => $ramen["created_at"],
                        "updated_at" => $ramen["updated_at"]
                    ],
                    "twitter_data" => [
                        "ramen_id" => $ramen->twitter_data["ramen_id"],
                        "twitter_id" => $ramen->twitter_data["twitter_id"],
                        "query" => $ramen->twitter_data["query"],
                        "account_name" => $ramen->twitter_data["account_name"],
                        "created_at" => $ramen->twitter_data["created_at"],
                        "updated_at" => $ramen->twitter_data["updated_at"]
                    ]
                    ];
                    // var_dump($ramen->twitter_data);
            }
            return [
                'ramen_data' => [
                    $ramen_array
                ]
            ];
        }
        
    }

    public function delete(string $ramenId = null)
    {
        if(!$ramenId == null){
            $ramen = EloquentRamen::find($ramenId);
            $ramen->delete();
            $ramen->twitter_data->delete();
        }else{
            DB::table('ramens')->delete();
            DB::table('twitter_data')->delete();
        }
        $ramens = EloquentRamen::all();
        $ramen_array = [];
        foreach ($ramens as $ramen)
        {
            $ramen_array[$ramen->ramen_id] = [
                $ramen
            ];
        }

        return [
            'ramens' => [
                $ramen_array
            ]
        ];
    }

    public function edit(Ramen $ramen)
    {
        $eloquent_ramen = EloquentRamen::find($ramen->ramen_id()->value());
        $eloquent_ramen->name = $ramen->name()->value();
        $eloquent_ramen->category = $ramen->category()->value();
        $eloquent_ramen->image_url = $ramen->image_url()->value();
        $eloquent_ramen->address = $ramen->address()->value();
        $eloquent_ramen->save();
    }
}
