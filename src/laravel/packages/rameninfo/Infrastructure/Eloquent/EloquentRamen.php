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

    protected $fillable = [
        'ramen_id',
        'name',
        'category',
        'image_url',
        'address',
    ];

}
