@extends('layouts.admin')

@section('content')
<div class="container">
    <form role="form" action="{{ route('category.update', $category->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input name="slug" type="text" class="form-control" placeholder="Slug" value="{{ $category->slug }}">
        </div>
        <input type="submit" class="btn btn-info" value="Save">
        <input type="reset" class="btn btn-danger" value="Reset">
    </form>
</div>
@endsection