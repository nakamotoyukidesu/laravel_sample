<?php

declare(strict_types=1);

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Sample\SampleParent;

abstract class SampleAbstruct extends SampleParent
{
    public function greet(){
        $this->greeting();
    }

}
