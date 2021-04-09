<?php

declare(strict_types=1);

namespace App\Http\Controllers\Sample;

use phpDocumentor\Reflection\Types\This;

class SampleParent
{
    public function greeting(){
        echo 'こんにちはこれはSampleParentのメソッドです';
    }

    public function greeting_print(){
        self::greeting();
    }
}
