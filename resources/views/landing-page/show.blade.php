@extends('layouts.admin')

@section('jav')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    <script type="text/javascript" charset="utf-8"></script>
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-10 main">
          <h1 class="page-header">Add new Article</h1>

          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-7 col-md-9">
                <div class="form-group">
                  <textarea name="content" id="content"></textarea>
                  <script>CKEDITOR.replace('content');</script>
                </div>
              </div>
              <div class="col-xs-5 col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-default">Save Draft</button>
                  <button type="submit" class="btn btn-default">Preview</button>
                  <button type="submit" class="btn btn-primary">Publish</button>
                </div>
                <div class="form-group">
                  <label for="created">Created</label>
                  <input type="text" class="form-control" id="created" placeholder="Created date">
                </div>
                <div class="form-group">
                  <label for="status_id">Status</label>
                  <select name="status_id" class="form-control">
                    <option value="">Status 1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="category_id">Category</label>
                  <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Category 1
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="" disabled>
                    Category 2
                  </label>
                </div>
                <div class="form-group">
                  <label for="metakeywords">Metakeywords</label>
                  <textarea placeholder="Metakeywords" name="metakeywords" class="form-control" rows="2"></textarea>
                  <p class="help-block">Separe the words with comma</p>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" id="image" class="form-control" />
                  <p class="help-block">Image definitions</p>
                </div>
                <a href="#" class="thumbnail">
                  <img src="http://fakeimg.pl/300/">
                </a>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
@endsection