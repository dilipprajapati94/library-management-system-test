<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BorrowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_borrow_book()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['copies_available' => 1]);
        $this->actingAs($user, 'api')->postJson('/api/borrow', ['book_id' => $book->id])->assertStatus(200);
    }
}
