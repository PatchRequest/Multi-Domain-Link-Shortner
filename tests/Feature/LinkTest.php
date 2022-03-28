<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_links()
    {
        $response = $this->get('/links');

        $response->assertStatus(200);
    }
    public function test_create_link_anon()
    {
        $response = $this->post('/links', [
            'url' => 'firstdomain.com/test',
            'target' => 'https://google.com',
        ]);

        $this->assertDatabaseCount('links', 1);
        $response->assertStatus(200);
    }
    public function test_create_link_auth()
    {
        $response = $this->actingAs(factory('App\User')->create())
            ->post('/links', [
                'url' => 'firstdomain.com/test',
                'target' => 'https://google.com',
            ]);

        $this->assertDatabaseCount('links', 1);
        $response->assertStatus(200);
    }

    public function test_get_link_info(){
        $link = Link::factory()->create();
        $response = $this->get('/links/'.$link->id);
        $response->assertStatus(200);
    }

}
