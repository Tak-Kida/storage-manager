<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Item;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    // 商品一覧ページ(/item)へのアクセス
    public function test_access_to_index()
    {
        // サービスへアクセスできること
        $this->assertTrue(true);

        // ログインせずにページが表示できないこと
        $response = $this->get('/item');
        $response->assertRedirect('/login');

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 1
        ]);
        $response = $this->actingAs($loginUser)->get('/item');
        $response->assertOk();

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 2
        ]);
        $response = $this->actingAs($loginUser)->get('/item');
        $response->assertOk();

        // 在庫受注社アカウントでページへ遷移できないこと
        $loginUser = User::factory()->create([
            'user_category' => 3,
        ]);
        $response = $this->actingAs($loginUser)->get('/item');
        $response->assertStatus(403);
    }

    // 商品追加ページ(/item/add)へのアクセス
    public function test_access_to_add()
    {
        // サービスへアクセスできること
        $this->assertTrue(true);

        // ログインせずにページが表示できないこと
        $response = $this->get('/item/add');
        $response->assertRedirect('/login');

        // 在庫発注社員でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 1
        ]);
        $response = $this->actingAs($loginUser)->get('/item/add');
        $response->assertOk();

        // 在庫発注社員でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 2
        ]);
        $response = $this->actingAs($loginUser)->get('/item/add');
        $response->assertOk();

        // 在庫受注社アカウントでitem一覧ページへ遷移できないこと
        $loginUser = User::factory()->create([
            'user_category' => 3,
        ]);
        $response = $this->actingAs($loginUser)->get('/item/add');
        $response->assertStatus(403);
    }

    // 商品の追加
    public function test_create_item()
    {
        Item::factory()->create([
            'name' => 'あいうえお',
            'price' => 250,
            'left_amount' => 1000,
        ]);
        Item::factory()->count(10)->create();
        $this -> assertDatabaseHas('items',
        [
            'name' => 'あいうえお',
            'price' => 250,
            'left_amount' => 1000,
        ]);
    }
    // 商品の編集
    // 商品の削除
}
