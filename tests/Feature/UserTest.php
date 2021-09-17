<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    // ユーザー一覧ページ(/user)へのアクセス
    public function test_access_to_index()
    {
        // サービスへアクセスできること
        $this->assertTrue(true);

        // ログインせずにページが表示できないこと
        $response = $this->get('/user');
        $response->assertRedirect('/login');

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 1
        ]);
        $response = $this->actingAs($loginUser)->get('/user');
        $response->assertOk();

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 2
        ]);
        $response = $this->actingAs($loginUser)->get('/user');
        $response->assertOk();

        // 在庫受注社アカウントでページへ遷移できないこと
        $loginUser = User::factory()->create([
            'user_category' => 3,
        ]);
        $response = $this->actingAs($loginUser)->get('/user');
        $response->assertStatus(403);
    }

    // ユーザー新規登録ページ(/register)へのアクセス
    public function test_access_to_register()
    {
        // サービスへアクセスできること
        $this->assertTrue(true);

        // ログインせずにページが表示できること
        $response = $this->get('/register');
        $response->assertOk();


        // ログイン状態でページに遷移するとホーム画面(/home)へリダイレクトされること
        $loginUser = User::factory()->create();
        $response = $this->actingAs($loginUser)->get('/register');
        $response->assertRedirect('/home');
    }

    // ユーザーのログイン
    // ユーザーの新規登録
    // ユーザーの削除
}
