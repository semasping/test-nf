@extends('layouts.app')

@section('content')
<a href="{{ route('manager' ) }}">Manage news</a>
@foreach ($news as $item)
    <h3><a href="/show/{{ $item->id }}">{{ $item->title }}</a></h3>

    <div>
        Category:{{ $item->category->name }}
    </div>
    <br><br>
@endforeach
@endsection