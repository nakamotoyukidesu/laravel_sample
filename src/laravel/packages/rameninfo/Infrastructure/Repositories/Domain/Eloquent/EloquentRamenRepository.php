<?php

declare(strict_types=1);

namespace rameninfo\Infrastructure\Repositories\Domain\Eloquent;


use Illuminate\Support\Facades\DB;
use rameninfo\Domain\Models\Ramen\Ramen;
use rameninfo\Domain\Models\Ramen\RamenId;
use rameninfo\Domain\Models\Ramen\RamenRepository;
use rameninfo\Infrastructure\Eloquent\EloquentRamen;

final class EloquentRamenRepository implements RamenRepository
{

    private $eloquentRamen;

    public function __construct()
    {
        $this->eloquentRamen = new EloquentRamen();
    }

    public function save(Ramen $ramen)
    {
        $this->eloquentRamen->fill($ramen->toArray())->save();
    }

    public function find(string $ramenId)
    {
        $ramen = EloquentRamen::find($ramenId);
        return [
            'ramen' => [
                $ramenId => [
                    $ramen
                ]
            ]
        ];
    }

    public function show()
    {
        $ramens = EloquentRamen::all();
        return [
            'ramens' => [
                $ramens
            ]
        ];
    }

    public function delete(string $ramenId = null)
    {
        if($ramenId == null){
            $ramen = EloquentRamen::find($ramenId);
            $ramen->delete();
        }else{
            DB::table('ramens')->truncate();
        }
    }
}
