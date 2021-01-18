@extends('layouts.admin')

@section('content')
<div class="container">
	<br>
	<a href="{{ route('article.create') }}" class="btn btn-md btn-info">Create New Article</a>
	 <div class="row">
	 	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	 		<div class="card" style="margin-top: 15px;">
 				<table class="table">
 					<thead class="thead-dark">
 						<tr>
	 						<th scope="col">No.</th>
							<th scope="col">Title</th>
							<th scope="col">Category</th>
							<th scope="col">Thumbnail</th>
							<th scope="col">Created Date</th>
							<th scope="col">Detail</th>
						</tr>
 					</thead>
 						
 					<input type="hidden" name="" value="{{ $no = 0 }}">

				 	@forelse($articles as $index => $article)
 					<tbody style="color: black;">
 						<tr>
 							<td>{{ $index += 1 }}</td>
							<td>{{ \Illuminate\Support\Str::ucfirst($article->title) }}</td>
							<td>
								@foreach($article->categories as $category)
								{{ \Illuminate\Support\Str::title($category->name) }}, 
								@endforeach
							</td>
							<td><img src="{{ asset('article/'.$article->image) }}" style="width: 170px; height: 100px; border-radius: 10px"></td>
							<td>{{ \Carbon\Carbon::parse($article->created_at)->format('H - d-M-Y') }}</td>
				            <td>
				                <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm" style="float: left; margin-right: 5px;">Show</a>
				            </td>
						</tr>
 					</tbody>
			 		@empty
			 			<h5>There is no data.</h5>	
				 	@endforelse
 				</table>

        		{!! $articles->links() !!}
	 		</div>
 		</div>
	 </div>
</div>
@endsection