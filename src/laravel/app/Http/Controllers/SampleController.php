<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Sample\SampleMain;

final class SampleController extends Controller
{
    public function index(){
        Log::info('SampleControllerが読み込まれました');
        $sample = new SampleMain();
        echo $sample->greet(); //SampleParentのメソッドです
        echo $sample->greeting_print(); //SampleParentのメソッドです
    }
}
