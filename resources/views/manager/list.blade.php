@extends('layouts.app')

@section('content')
    <a href="{{ route('manager.create' ) }}">Add news</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
        </tr>

        @foreach ($news as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="{{ route('manager.edit', $item->id)  }}" class="btn btn-link">Edit news</a>
                    <form action="{{ route('manager.destroy', $item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-link">Delete news</button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
        <tfoot></tfoot>
    </table>
@endsection()