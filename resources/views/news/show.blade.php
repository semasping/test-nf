@extends('layouts.app')

@section('content')
    <h1><a href="/show/{{ $news->id }}">{{ $news->title }}</a></h1>
    <div><p>
            Body:<br>
            {{ $news->body }}
        </p>
    </div>
    <div>
        <p>
            Category:<br>
            {{ $news->category->name }}
        </p>
    </div>
@endsection
