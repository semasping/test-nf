@extends('layouts.app')

@section('content')

    <div class="col">
        <div class="row">
            <form class="" {{ URL::to('/') }} method="GET">
                Category filter:
                <select name="category_id">
                    <option value="">All</option>
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}" {{ ($category_id == $item->id ? "selected":"") }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Filter">

            </form>
        </div>
        @foreach ($news as $item)
            <div class="row">
                <div class="col"><h3><a href="/show/{{ $item->id }}">{{ $item->title }}</a></h3></div>
                <div class="col">Category: {{ $item->category->name }}</div>
            </div>
        @endforeach
    </div>
@endsection