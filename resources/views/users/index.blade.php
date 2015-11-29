@extends('app')

@section('content')
  <div class="panel panel-default">
	<div class="panel-heading">
		All Users
		<!--<div class="panel-nav pull-right" style="margin-top: -7px;">
			<a href="{!! route('users.create') !!}" class="btn btn-default">Add New</a>
		</div> -->
	</div>
	<table class="table table-stripped table-bordered">
		<thead>
			<th class="text-center">Serial No.</th>
			<th>Name</th>
			<th>Contact No.</th>
			<th>Email</th>
			<th>Subscription</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td class="text-center">{!! $no !!}</td>
					<td>{!! $user->name !!}</td>
					<td>{!! $user->contact_no !!}</td>
					<td>{!! $user->email !!}</td>
					<td>
						<?php echo (isset($subscription_data[$user->subscription])) ? ucfirst($subscription_data[$user->subscription]) : 'Free'; ?>
					</td>
					<td>{!! $user->start_date !!}</td>
					<td>{!! $user->end_date !!}</td>					
					<td>{!! $user->created_at !!}</td>
					<td class="text-center">
						<div class="btn-group">
							{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'delete-broadcast-form']) !!}
							<!--<a href="{!! route('users.show', $user->id) !!}" class="btn btn-sm btn-default" title="View" data-toggle="tooltip">View</a>-->
							<a href="{!! route('users.edit', $user->id) !!}" class="btn btn-sm btn-default" title="Edit" data-toggle="tooltip">Edit</a>
							<button type="submit" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip">Delete</button>
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
	<div class="panel-footer">
		<div class="text-center">{!! $users !!}</div>
	</div>
</div>
@stop