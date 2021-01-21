@extends('layouts.admin')

@section('content')
<div class="container">
    <form role="form" action="{{ route('books-category.update', $category->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $category->title }}">
        </div>
        <input type="submit" class="btn btn-info" value="Save">
        <input type="reset" class="btn btn-danger" value="Reset">
    </form>
</div>
@endsection