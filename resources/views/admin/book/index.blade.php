@extends('layouts/admin')

@section('content')

<div class="card mb-3">
    <div class="card-body">
        <h2 class="card-title" style="font-weight: bold;">Daftar Buku</h2>
        <a class="btn btn-sm btn-info active" href="{{ route('books.create') }}" style="float:right;">Tambah Data</a>
    </div>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Category</th>
            <th scope="col" class="col-sm-2">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tanggal Terbit</th>
            <th scope="col">Bahasa</th>
            <th scope="col">Status</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $key => $book)
        <tr>
            <td> {{ $key+=1 }} </td>
            <td> {{ $book->category->title }} </td>
            <td> {{ $book->title }} </td>
            <td> {{ $book->author }} </td>
            <td> {{ $book->publisher }} </td>
            <td> {{ $book->publish_date }} </td>
            <td> {{ $book->language }} </td>
            @if($book->status == 1)
            <td> <p class=" btn-success btn-sm"> Available </p> </td>
            @elseif($book->status == 0)
            <td> <p class=" btn-danger btn-sm"> Dipinjam </p> </td>
            @endif
            <td>
                <a href="{{ route('books.show', [$book->id]) }}" class="btn btn-sm btn-info"> Tampilkan </a>
            </td> 
        </tr>
        @endforeach
        {{ $books->links() }}
      </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('import.student') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection