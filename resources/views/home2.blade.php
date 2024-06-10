@extends('layouts.userp')

@section('title', 'Home')

@section('contents')

@if (count($bukus) > 0)
    <div class="w-full py-8 px-4">
        <h1 class="text-xl font-semibold py-4">All Books</h1>
        <div class="grid grid-cols-4 gap-5">
            @foreach($bukus as $buku)
        <div class="w-40 h-full overflow-hidden">
            <a href="{{ route('books.show', $buku->id) }}">
                <img src="{{ asset('/storage/bukus/'.$buku->image) }}" class="rounded" style="width: 100%;">
                <h3 class="py-1 w-full flex justify-center">{{ $buku->judul }}</h3>
            </a>
        </div>
    @endforeach
</div>
</div>
@else
    <p>No books found.</p>
@endif
@endsection
