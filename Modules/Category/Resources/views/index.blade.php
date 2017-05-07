@extends('backend.layouts.app')
@section('title')
    Dashboard
@endsection
@section('site_map')
    Dashboard
@endsection
@section('content')

<div class="panel panel-primary">
      <div class="panel-body">
      	<div class="row">
			<div class="col-md-6">
				<h4>Categories</h4>
				<div class="input">
					<form role="form" action="{{url('admin/category/store')}}" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="col-md-3">
								<label for="name" {{ $errors->has('name') ? ' has-error' : '' }}>Name:</label>
							</div>
							<div class="col-md-9">							
								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="category_name" value="{{old('category_name')}}" required>
								@if ($errors->has('name'))
								<span class="help-block" style="color: #cc0000">
									<strong> * {{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<input type="hidden" name="parent_id" value="0">
						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
						</div>
					</form>
				</div>
				<hr>
				<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>CATEGORY NAME</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $category)
							<tr>
								<td>{{$category['id']}}</td>
								<td>{{$category['category_name']}}</td>
								<td>
									<a href="{{url('admin/category/'.$category['id'].'/edit')}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
									<a href="{{url('admin/category/delete/'.$category['id'])}}" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a></i></a>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
			</div>

		</div>
      </div>
</div>

@stop
