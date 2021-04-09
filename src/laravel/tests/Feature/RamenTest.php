<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use rameninfo\Infrastructure\Repositories\Domain\Eloquent\EloquentRamenRepository;
use Tests\TestCase;

class RamenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $eloquent_ramen = new EloquentRamenRepository();
        $eloquent_ramen->show();
    }
}
