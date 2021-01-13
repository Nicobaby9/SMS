@extends('layouts.admin')

@section('content')
<div class="container">
	<a href="{{ route('article.create') }}" class="btn btn-sm btn-info">Create New Article</a>
	 <div class="row">
	 	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	 		<div class="card" style="margin-top: 15px;">
 				<table class="table">
 					<thead class="thead-dark">
 						<tr>
	 						<th scope="col">No.</th>
							<th scope="col">Author</th>
							<th scope="col">Title</th>
							<th scope="col" class="col-md-4">Content</th>
							<th scope="col">Category</th>
							<th scope="col">Image</th>
						</tr>
 					</thead>
 						
 					<input type="hidden" name="" value="{{ $no = 0 }}">

				 	@forelse($articles as $article)
 					<tbody style="color: black;">
 						<tr>
 							<td>{{ $no+=1 }}</td>
							<td>{{ \Illuminate\Support\Str::ucfirst($article->user->fullname) }}</td>
							<td>{{ \Illuminate\Support\Str::ucfirst($article->title) }}</td>
							<td >{!! $article->content !!}</td>
							<td>{{ \Carbon\Carbon::parse($article->created_at)->format('d-M-Y') }}</td>
				            <td>
				                <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm" style="float: left; margin-right: 5px;">Show</a>
				            </td>
						</tr>
 					</tbody>
			 		@empty
			 			<h5>There is no data.</h5>	
				 	@endforelse
 				</table>
	 		</div>
 		</div>
	 </div>
</div>
@endsection