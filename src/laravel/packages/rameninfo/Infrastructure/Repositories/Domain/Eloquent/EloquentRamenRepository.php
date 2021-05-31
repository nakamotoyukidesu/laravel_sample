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
            'ramen' => [
                $ramenId => [
                    'ramen_data' => $ramen,
                    'twitter_data' => $ramen->twitter_data
                ]
            ]
        ];
    }

    public function show()
    {
        $ramens = EloquentRamen::all();
        $ramen_array = [];
        foreach ($ramens as $ramen)
        {
            $ramen_array[$ramen->ramen_id] = [
                'ramen_data' => $ramen,
                'twitter_data' => $ramen->twitter_data
            ];
        }

        return [
            'ramens' => [
                $ramen_array
            ]
        ];
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
