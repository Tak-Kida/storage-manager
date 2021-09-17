<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    // アクセスに関するテスト
    public function test_access()
    {
        // サービス自体へアクセスできること
        $this->assertTrue(true);

        // ログインせずにログインページが表示できること
        $response = $this->get('/login');
        $response->assertOk();

        // ログインせずにホームへ遷移できないこと
        $response = $this->get('/');
        $response->assertRedirect('/login');

        // 在庫発注管理者でログイン状態でホームに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 1,
        ]);
        $response = $this->actingAs($loginUser)->get('/');
        $response->assertOk();

        // 在庫発注社員でログイン状態でホームに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 2,
        ]);
        $response = $this->actingAs($loginUser)->get('/');
        $response->assertOk();

        // 在庫受注社でログイン状態でホームに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 3,
        ]);
        $response = $this->actingAs($loginUser)->get('/');
        $response->assertOk();

        // 存在しないページへアクセスすると404エラーとなること
        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
}
