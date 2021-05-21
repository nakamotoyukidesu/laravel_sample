<?php

declare(strict_types=1);

namespace rameninfo\Infrastructure\Eloquent;


use Illuminate\Database\Eloquent\Model;

final class EloquentTwitterData extends Model
{

    protected $table = 'twitter_data';

    protected $primaryKey = 'ramen_id';

    protected $casts = [
        "ramen_id" => "string",
    ];

    public $incrementing = false;

    protected $keyType = "string";

    protected $fillable = [
        'ramen_id',
        'twitter_id',
        'query',
        'account_name',
    ];

    public function ramen()
    {
        return $this->belongsTo(EloquentRamen::class,"ramen_id","ramen_id");
    }
}
