<?php

namespace Tests\Feature;

use App\Observable;
use Mockery\Mock;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Observable::flushEventListeners();
        $observer = Observable::create();
    }
}
