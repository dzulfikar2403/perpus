@extends('layouts.user')

@section('title', 'Home')

@section('contents')

@if (count($bukus) > 0)
<div class="flex items-center">
    <div class="w-full rounded-bl-2xl shadow-2xl bg-slate-50 ms-10 py-8 px-4">
        <div class="w-3/4 flex flex-col mx-auto">
            <img src="{{ asset('img/banner.png') }}" class="w-full rounded-lg h-64" alt="">
            <div class="w-2 py-1 px-2 my-2 rounded-full mx-auto bg-cyan-700"></div>
        </div>
        <h1 class="text-xl font-semibold py-4">All Books</h1>
    <div class="grid grid-cols-4 gap-5">
        @foreach($bukus as $buku)
    <div class="w-40 overflow-hidden">
        <a href="{{ route('books.show', $buku->id) }}">
            <img src="{{ asset('/storage/bukus/'.$buku->image) }}" class="rounded h-60" style="width: 100%;">
            <h3 class="py-1 w-full font-mono text-sm py-1 flex justify-center">{{ $buku->judul }}</h3>
        </a>
</div>
@endforeach
</div>
</div>
</div>
@else
    <p>No books found.</p>
@endif
@endsection
