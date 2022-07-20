<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ViewAnotherUsersTweetsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_view_another_users_tweets()
    {
        $user = User::factory()->create([
            'name'=>'john.doe',
        ]);
        $tweet = Tweet::factory()->make([
            'body' => 'My first tweet',
        ]);
        $user->tweets()->save($tweet);

        $response = $this->get('users');
        $response->assertSee('My first tweet');
    }
}
