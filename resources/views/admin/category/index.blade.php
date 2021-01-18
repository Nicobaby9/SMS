@extends('layouts.admin')

@section('content')
<div class="container">
	<a href="{{ route('category.create') }}" class="btn btn-sm btn-info">Create New Category</a>
	 <div class="row">
	 	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	 		<div class="card" style="margin-top: 15px;">
 				<table class="table">
 					<thead class="thead-dark">
 						<tr>
	 						<th scope="col">No.</th>
							<th scope="col">Name</th>
							<th scope="col">Slug</th>
							<th scope="col">Created at</th>
							<th scope="col">Action</th>
						</tr>
 					</thead>
 						
 					<input type="hidden" name="" value="{{ $no = 0 }}">

				 	@forelse($categories as $category)
 					<tbody>
 						<tr>
 							<td>{{ $no+=1 }}</td>
							<td>{{ \Illuminate\Support\Str::ucfirst($category->name) }}</td>
							<td>{{ \Illuminate\Support\Str::ucfirst($category->slug) }}</td>
							<td>{{ \Carbon\Carbon::parse($category->created_at)->format('d-M-Y') }}</td>
				            <td>
				                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm" style="float: left; margin-right: 5px;">Edit</a>
								<form action="{{ route('category.destroy', $category->id) }}" method="post" class="inline-it">
									@csrf
									@method('DELETE')
									<input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
								</form>
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