<h2>My Borrow History</h2>
@foreach($rows as $r)
<div>
    {{ $r->book->title }} | {{ $r->status }}
    @if(!$r->returned_at)
    <form method="POST" action="/return">@csrf
        <input type="hidden" name="borrowing_id" value="{{ $r->id }}">
        <button>Return</button>
    </form>
    @endif
</div>
@endforeach