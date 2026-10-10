<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_can_be_created_listed_shown_updated_and_deleted(): void
    {
        $this->postJson('/api/books', [
            'title' => 'Laravel API',
            'description' => null,
            'status' => 1,
        ])
            ->assertCreated()
            ->assertJsonPath('title', 'Laravel API');

        $book = Book::firstOrFail();

        $this->getJson('/api/books')
            ->assertOk()
            ->assertJsonCount(1);

        $this->getJson("/api/books/{$book->id}")
            ->assertOk()
            ->assertJsonPath('id', $book->id);

        $this->patchJson("/api/books/{$book->id}", ['title' => 'Updated title'])
            ->assertOk()
            ->assertJsonPath('title', 'Updated title');

        $this->deleteJson("/api/books/{$book->id}")
            ->assertOk()
            ->assertJsonPath('message', 'Book deleted');

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_book_creation_validates_required_fields(): void
    {
        $this->postJson('/api/books', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['title']);
    }

    public function test_missing_books_return_not_found(): void
    {
        $this->getJson('/api/books/999')
            ->assertNotFound();
    }
}
