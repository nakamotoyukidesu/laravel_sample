<?php

declare(strict_types=1);

use App\Http\Controllers\Controller;

final class SampleController extends Controller
{
    public function index(){
        $sample = new SampleMain();
        $sample->greeting();
    }
}
