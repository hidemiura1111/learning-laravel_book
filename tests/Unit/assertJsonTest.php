<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class assertJsonTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test for index method.
     *
     * @return void
     */
    public function testIndex()
    {
        // テスト用のユーザーを作成
        User::factory()->count(3)->create();

        // APIエンドポイントへのGETリクエストを実行
        $response = $this->get('/api/users');

        // レスポンスのステータスコードを確認
        $response->assertStatus(200);

        // レスポンスのJSONデータを取得
        $responseData = $response->json();

        // レスポンスデータの構造を確認
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    // 'password',
                    // 'remember_token',
                    'created_at',
                    'updated_at',
                ],
            ],
            'message',
        ]);

        // レスポンスデータの件数を確認
        $this->assertCount(3, $responseData['data']);
    }

    /**
     * Test for show method.
     *
     * @return void
     */
    public function testShow()
    {
        // テスト用のユーザーを作成
        $user = User::factory()->create();

        // APIエンドポイントへのGETリクエストを実行
        $response = $this->get('/api/users/' . $user->id);

        // レスポンスのステータスコードを確認
        $response->assertStatus(200);

        // レスポンスのJSONデータを取得
        $responseData = $response->json();

        // レスポンスデータの構造を確認
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
            'message',
        ]);

        // レスポンスデータの値を確認
        $this->assertEquals($user->id, $responseData['data']['id']);
        $this->assertEquals($user->name, $responseData['data']['name']);
        $this->assertEquals($user->email, $responseData['data']['email']);
    }

    /**
     * Test for show method.
     *
     * @return void
     */
    public function assertJsonTrial()
    {
        // テスト用のユーザーを作成
        $user = User::factory()->create([
            'id' => 1,
            'name' => 'name is email',
            'email' => 'test@miura.com',
        ]);

        // APIエンドポイントへのGETリクエストを実行
        $response = $this->get('/api/users/' . $user->id);

        // レスポンスのステータスコードを確認
        $response->assertStatus(200);

        // レスポンスのJSONデータを取得
        $responseData = $response->json();

        // レスポンスデータの構造を確認
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
            'message',
        ])
        ->assertSee('email') // Check key as well
        ->assertSeeText('test'); 

        $this->assertContains('is', $responseData['data']['name']);        

    }
}