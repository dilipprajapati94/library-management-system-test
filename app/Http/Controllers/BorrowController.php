<?php

namespace App\Http\Controllers;

use App\Services\BorrowingService;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function borrow(Request $r, BorrowingService $s)
    {
        $r->validate(['book_id' => 'required|exists:books,id']);
        $s->borrow(auth()->user(), $r->book_id);
        return back();
    }

    public function return(Request $r, BorrowingService $s)
    {
        $r->validate(['book_id' => 'required|exists:books,id']);
        $s->returnBook(auth()->user(), $r->book_id);
        return back();
    }
     public function history()
    {
        $rows = \App\Models\Borrowing::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('borrows.history', compact('rows'));
    }
}
