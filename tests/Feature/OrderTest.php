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
use App\Models\Order;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    // 発注一覧ページ(/order)へのアクセス
    public function test_access_to_index()
    {
        // サービスへアクセスできること
        $this->assertTrue(true);

        // ログインせずにページが表示できないこと
        $response = $this->get('/order');
        $response->assertRedirect('/login');

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 1
        ]);
        $response = $this->actingAs($loginUser)->get('/order');
        $response->assertOk();

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 2
        ]);
        $response = $this->actingAs($loginUser)->get('/order');
        $response->assertOk();

        // 在庫受注社アカウントでページへ遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 3,
        ]);
        $response = $this->actingAs($loginUser)->get('/order');
        $response->assertOk();
    }

    // 発注追加ページ(/order/add)へのアクセス
    public function test_access_to_add()
    {
        // サービスへアクセスできること
        $this->assertTrue(true);

        // ログインせずにページが表示できないこと
        $response = $this->get('/order/add');
        $response->assertRedirect('/login');

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 1
        ]);
        $response = $this->actingAs($loginUser)->get('/order/add');
        $response->assertOk();

        // 在庫発注社員でログイン状態でページに遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 2
        ]);
        $response = $this->actingAs($loginUser)->get('/order/add');
        $response->assertOk();

        // 在庫受注社アカウントでページへ遷移できること
        $loginUser = User::factory()->create([
            'user_category' => 3,
        ]);
        $response = $this->actingAs($loginUser)->get('/order/add');
        $response->assertStatus(403);
    }

    // 発注の追加
    public function test_create_order()
    {
        Order::factory()->create([
            'item_id' => 1,
            'item_amount' => 100,
            'order_total_price' => 20000,
            'user_id' => 1,
            'order_status' => 1,
        ]);
        $this -> assertDatabaseHas('orders',
        [
            'item_id' => 1,
            'item_amount' => 100,
            'order_total_price' => 20000,
            'user_id' => 1,
            'order_status' => 1,
        ]);
    }
}
