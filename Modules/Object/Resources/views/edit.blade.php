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
					<form role="form" action="{{url('admin/object/update/'.$object['id'])}}" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="col-md-3">
								<label for="object_name" {{ $errors->has('object_name') ? ' has-error' : '' }}>Name:</label>
							</div>
							<div class="col-md-9">							
								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="object_name" value="{{$object['object_name']}}" required>
								@if ($errors->has('object_name'))
								<span class="help-block" style="color: #cc0000">
									<strong> * {{ $errors->first('object_name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="category_id" {{ $errors->has('category_id') ? ' has-error' : '' }}>Category:</label>
							</div>
							<div class="col-md-9">							
								<select class="form-control" name="category_id">
									@foreach($categories as $category)
										<option value="{{$category['id']}}">{{$category['category_name']}}
										</option>
									@endforeach
										
								</select> 
								@if ($errors->has('category_id'))
								<span class="help-block" style="color: #cc0000">
									<strong> * {{ $errors->first('category_id') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3">
								<label for="cover_image" {{ $errors->has('cover_image') ? ' has-error' : '' }}>Image:</label>
							</div>
							<div class="col-md-9">
								<input type="file" name="cover_image" class="form-control">
							</div>
						</div>
						


						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop