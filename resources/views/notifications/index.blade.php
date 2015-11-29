@extends('layouts.master')

@section('content')
  <div class="panel panel-default">
	<div class="panel-heading">
		All Notifications
		<div class="panel-nav pull-right" style="margin-top: -7px;">
			<a href="{!! route('notifications.create') !!}" class="btn btn-default">Add New</a>
		</div>
	</div>
	<table class="table table-stripped table-bordered">
		<thead>
			<th class="text-center">#</th>
			<th>User_id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Image_url</th>
			<th>Type</th>

			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($notifications as $notification)
				<tr>
					<td class="text-center">{!! $no !!}</td>
					<td>{!! $notification->user_id !!}</td>
					<td>{!! $notification->title !!}</td>
					<td>{!! $notification->description !!}</td>
					<td>{!! $notification->image_url !!}</td>
					<td>{!! $notification->type !!}</td>
		
					<td>{!! $notification->created_at !!}</td>
					<td class="text-center">
						<div class="btn-group">
							{!! Form::open(['method' => 'DELETE', 'route' => ['notifications.destroy', $notification->id]]) !!}
							<a href="{!! route('notifications.show', $notification->id) !!}" class="btn btn-sm btn-default" title="View" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="{!! route('notifications.edit', $notification->id) !!}" class="btn btn-sm btn-default" title="Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit"></i></a>
							<button type="submit" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></button>
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
	<div class="panel-footer">
		<div class="text-center">{!! $notifications !!}</div>
	</div>
</div>
@stop