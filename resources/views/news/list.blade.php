@foreach ($news as $item)
    <h3><a href="/show/{{ $item->id }}">{{ $item->title }}</a></h3>

    <div>
        Category:{{ $item->category->name }}
    </div>
    <br><br>
@endforeach