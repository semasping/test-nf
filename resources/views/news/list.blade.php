@extends('layouts.app')

@section('content')

    <div class="col">
        @foreach ($news as $item)
            <div class="row">
                <div class="col"><h3><a href="/show/{{ $item->id }}">{{ $item->title }}</a></h3></div>
                <div class="col">Category: {{ $item->category->name }}</div>
            </div>
        @endforeach
    </div>
@endsection