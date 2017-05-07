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
				<h4>Add Attributes</h4>
				<div class="input">
					<form role="form" action="{{url('admin/object/store-attribute')}}" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="col-md-3">
								<label for="object_id" {{ $errors->has('object_id') ? ' has-error' : '' }}>Object:</label>
							</div>
							<div class="col-md-9">							
								<h5><b>{{$object['object_name']}}</b></h5>
								<input type="hidden" name="object_id" value="{{$object['id']}}">
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-3">
								<label for="attribute_name" {{ $errors->has('attribute_name') ? ' has-error' : '' }}>Attribute Title:</label>
							</div>
							<div class="col-md-9">							
								<input type="text" name="attribute_name" class="form-control">
								@if ($errors->has('attribute_name'))
								<span class="help-block" style="color: #cc0000">
									<strong> * {{ $errors->first('attribute_name') }}</strong>
								</span>
								@endif
							</div>
						</div>




						<div class="form-group">
							<div class="col-md-3">
								<label for="attribute" {{ $errors->has('attribute') ? ' has-error' : '' }}>Attribute:</label>
							</div>
							<div class="col-md-9">							
								<textarea name="attribute" class="form-control" row="5" ></textarea>
								@if ($errors->has('attribute'))
								<span class="help-block" style="color: #cc0000">
									<strong> * {{ $errors->first('attribute') }}</strong>
								</span>
								@endif
							</div>
						</div>

					
						


						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-6">
				<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Object NAME</th>
								<th>ATRIBUTE NAME</th>
								<th>ATTRIBUTE</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($attributes as $attribute)
							<tr>
								<td>{{$attribute['id']}}</td>
								<td>{{$object['object_name']}}</td>
								<td>
									{{$attribute['attribute_name']}}
								</td>
								<td>
									{{$attribute['attribute']}}
								</td>
								<td>
									<a href="{{url('admin/attribute/'.$attribute['id'].'/edit')}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
									<a href="{{url('admin/attribute/delete/'.$attribute['id'])}}" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a><br/>


									<a href="{{url('admin/attribute/create-attribute/'.$attribute['id'])}}" data-toggle="tooltip" title="Add Attriute" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
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
