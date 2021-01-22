@extends('layouts.admin')

@section('content')
<div class="container">
	<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Create New Category</a>
	 <div class="row">
	 	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	 		<div class="card-body">
	            <div class="tab-content">
	                <div class="collapse multi-collapse" id="multiCollapseExample1">
	                	<form role="form" action="{{ route('article-category.store') }}" method="post">
					        @csrf
					        <div class="form-group">
					            <label>Name</label>
					            <input name="name" type="text" class="form-control" placeholder="Name" required>
					        </div>
					        <div class="form-group">
					            <label>Slug</label>
					            <input name="slug" type="text" class="form-control" placeholder="Slug" required>
					        </div>
					        <input type="submit" class="btn btn-info" value="Save">
					        <input type="reset" class="btn btn-danger" value="Reset">
					    </form>
	                </div>
	            </div>
	        </div>
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
				                <a href="{{ route('article-category.edit', $category->id) }}" class="btn btn-info btn-sm" style="float: left; margin-right: 5px;">Edit</a>
								<form action="{{ route('article-category.destroy', $category->id) }}" method="post" class="inline-it">
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