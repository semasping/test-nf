@extends('layouts.app')
@if($errors->any())
    Errors:
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div><br>
    @endforeach
@endif
<H1> Edit: {{ $news->title }}</H1>
<form method="post" action="{{ route('manager.update', $news->id) }}">
    @method('PUT')
    {!! csrf_field() !!}
    Title: <input type="text" name="title" value="{{ $news->title }}"/>
    <br><br>
    Category:<select name="category_id">
        @foreach($categories as $item)
            <option value="{{ $item->id }}" {{ ($news->category_id == $item->id ? "selected":"") }}>{{ $item->name }}</option>
        @endforeach
    </select>
    <br><br>
    Body: <textarea name="body">{{ $news->body }}</textarea>
    <br><br>
    <input type="submit" value="Save">
</form>

