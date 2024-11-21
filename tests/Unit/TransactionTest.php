<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_transaction()
    {
        $user = User::factory()->create();

        $transactionData = [
            'user_id' => $user->id,
            'amount' => 50.00,
            'type' => 'deposit',
            'description' => 'Initial deposit'
        ];

        $response = $this->postJson('/api/v1/transactions', $transactionData);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'amount' => '50.00',
                     'type' => 'deposit'
                 ]);
    }
}

//dick edidiong bassey
