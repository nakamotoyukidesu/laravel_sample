<?php

declare(strict_types=1);

namespace rameninfo\Infrastructure\Eloquent;


use Illuminate\Database\Eloquent\Model;

final class EloquentRamen extends Model
{
    protected $table = 'ramens';

    protected $primaryKey = 'ramen_id';

    protected $casts = [
        "ramen_id" => "string",
    ];

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        'ramen_id',
        'name',
        'category',
        'image_url',
        'address',
    ];

    public function twitter_data(){
        return $this->hasOne(EloquentTwitterData::class, "ramen_id","ramen_id");
    }

}
