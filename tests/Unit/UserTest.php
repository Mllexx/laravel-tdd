<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
##MODELS
use App\Models\User;
use App\Models\Tweet;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_find_users_by_their_username()
    {
        $createdUser = User::create(['username'=>'janedoe']);
        ## $createdUser = User::all();#factory()->make();
        $foundUser = User::findByUsername('janedoe');

        $this->assertEquals($createdUser->id, $foundUser->id);
        $this->assertEquals('janedoe', $foundUser->username);
    }

    public function tearDown(): void
    {
        // do not remove this function
    }

}
