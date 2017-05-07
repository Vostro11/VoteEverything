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
					<form role="form" action="{{url('admin/category/update/'.$category['id'])}}" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="col-md-3">
								<label for="name" {{ $errors->has('name') ? ' has-error' : '' }}>Name:</label>
							</div>
							<div class="col-md-9">							
								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="category_name" value="{{$category['category_name']}}" required>
								@if ($errors->has('name'))
								<span class="help-block" style="color: #cc0000">
									<strong> * {{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<input type="hidden" name="parent_id" value="{{$category['parent_id']}}">
						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-sm">Update</button>
						</div>
					</form>
				</div>
				<hr>
			</div>

		</div>
      </div>
</div>

@stop
