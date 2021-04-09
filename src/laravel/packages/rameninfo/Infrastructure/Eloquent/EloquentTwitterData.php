<?php

declare(strict_types=1);

namespace rameninfo\Infrastructure\Eloquent;


use Illuminate\Database\Eloquent\Model;

final class EloquentTwitterData extends Model
{

    protected $table = 'twitter_data';

    protected $fillable = [
        'ramen_id',
        'twitter_id',
        'query',
        'account_name',
    ];
}
