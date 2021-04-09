<?php

declare(strict_types=1);

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Sample\SampleAbstruct;

final class SampleMain extends SampleAbstruct implements SampleInterface
{

    public function greeting()
    {
        echo 'こんにちはこれはSampleMainのメソッドです';
    }

}
