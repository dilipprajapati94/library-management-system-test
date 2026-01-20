<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Borrowing;
use Exception;

class BorrowingService
{
    public function borrow($u, $id)
    {
        $b = Book::findOrFail($id);
        if ($b->copies_available <= 0) throw new Exception('No copies');
        if (Borrowing::where('user_id', $u->id)->where('book_id', $id)->whereNull('returned_at')->exists()) throw new Exception('Already borrowed');
        if (Borrowing::where('user_id', $u->id)->whereNull('returned_at')->count() >= 5) throw new Exception('Limit');
        $b->decrement('copies_available');
        Borrowing::create(['user_id' => $u->id, 'book_id' => $id, 'borrowed_at' => now(), 'due_at' => now()->addDays(14)]);
    }

    public function returnBook($u, $id)
    {
        $br = Borrowing::where('user_id', $u->id)->where('book_id', $id)->whereNull('returned_at')->firstOrFail();
        $br->update(['returned_at' => now(), 'status' => 'returned']);
        $br->book->increment('copies_available');
    }
}
