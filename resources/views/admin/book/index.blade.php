@extends('layouts/admin')

@section('content')

<div class="card mb-3 sm-2 xs-2">
    <div class="card-body text-center">
        <h2 style="font-weight: bold;">Daftar Buku</h2>
        <a class="btn btn-sm btn-info active" href="{{ route('books.create') }}" style="float:right;">Tambah Data</a>
        <br>
        <a href="{{ route('export.book') }}" class="btn btn-xs btn-danger" style="float:left; margin-right: 5px;">Export Data </a>
    </div>
    <table class="table col-md-12 col-sm-8 col-xs-2">
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
        @forelse($books as $key => $book)
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
        @empty
        <tr>
            <td class="col-md-12 col-sm-6 col-xl-4">There is no data.</td>
        </tr>
        @endforelse
      </tbody>
        {{ $books->links() }}
    </table>
</div>

@endsection