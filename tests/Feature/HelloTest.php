<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Person;

class HelloTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);

        // Feature test
        $arr = [];
        $this->assertEmpty($arr);

        $msg = 'hello';
        $this->assertEquals('hello', $msg);

        $n = random_int(0, 100);
        $this->assertLessThan(100, $n);

        $this->assertTrue(true);

        // Access test
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/hello/auth');
        $response->assertStatus(302);

        $user = User::factory()->create(); // how to use factory() was changed in Laravel 8
        $response = $this->actingAs($user)->get('/hello/auth');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);

        // Database test
        User::factory()->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);
        User::factory(10)->create();
        $this->assertDatabaseHas('users',[
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);

        Person::factory()->create([
            'name' => 'XXX',
            'mail' => 'YYY@ZZZ.com',
            'age' => '123',
        ]);
        Person::factory(10)->create();
        $this->assertDatabaseHas('people',[
            'name' => 'XXX',
            'mail' => 'YYY@ZZZ.com',
            'age' => '123',
        ]);
    }
}
