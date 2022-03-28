<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClickTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_redirect()
    {
        $link = Link::factory()->create();
        $response = $this->get($link->url);

        $response->assertRedirect($link->target);
    }
}
