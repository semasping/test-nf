@extends('layouts.app')
@if($errors->any())
    Errors:
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div><br>
    @endforeach
@endif
<form method="post" action="{{ route('manager.store') }}">
    {!! csrf_field() !!}
    Title: <input type="text" name="title" value="{{ old('title') }}"/>
    <br><br>
    Category:<select name="category_id">
        @foreach($categories as $item)
            <option value="{{ $item->id }}" {{ (old("category_id") == $item->id ? "selected":"") }}>{{ $item->name }}</option>
        @endforeach
    </select>
    <br><br>
    Body: <textarea name="body">{{ old('body') }}</textarea>
    <br><br>
    <input type="submit" value="Save">
</form>

