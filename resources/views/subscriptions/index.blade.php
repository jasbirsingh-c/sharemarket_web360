@extends('app')

@section('content')
  <div class="panel panel-default">
	<div class="panel-heading">
		All Subscriptions
		<div class="panel-nav pull-right" style="margin-top: -7px;">
			<a href="{!! route('subscriptions.create') !!}" class="btn btn-default">Add New</a>
		</div>
	</div>
	<table class="table table-stripped table-bordered">
		<thead>
			<th class="text-center">#</th>
			<th>Subscription_name</th>
			<th>Description</th>
			<th>Amt</th>
			<th>Segment</th>
			<th>Msg_delivery</th>
			<th>Jackpot_calls</th>
			<th>Earlier_calls</th>
			<th>Telephonic_support</th>
			<th>Client_query</th>
			<th>Msg_on_alert</th>

			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($subscriptions as $subscription)
				<tr>
					<td class="text-center">{!! $no !!}</td>
					<td>{!! $subscription->subscription_name !!}</td>
					<td>{!! $subscription->description !!}</td>
					<td>{!! $subscription->amt !!}</td>
					<td>{!! ($subscription->segment == 1) ? 'Yes' : 'No'; !!}</td>
					<td>{!! ($subscription->msg_delivery == 1) ? 'Yes' : 'No'; !!}</td>
					<td>{!! ($subscription->jackpot_calls == 1) ? 'Yes' : 'No'; !!}</td>
					<td>{!! ($subscription->earlier_calls == 1) ? 'Yes' : 'No'; !!}</td>
					<td>{!! ($subscription->telephonic_support == 1) ? 'Yes' : 'No'; !!}</td>
					<td>{!! ($subscription->client_query == 1) ? 'Yes' : 'No'; !!}</td>
					<td>{!! ($subscription->msg_on_alert == 1) ? 'Yes' : 'No'; !!}</td>
		
					<td>{!! $subscription->created_at !!}</td>
					<td class="text-center">
						<div class="btn-group">
							{!! Form::open(['method' => 'DELETE', 'route' => ['subscriptions.destroy', $subscription->id], 'class' => 'delete-broadcast-form']) !!}
							<!-- <a href="{!! route('subscriptions.show', $subscription->id) !!}" class="btn btn-sm btn-default" title="View" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i></a> -->
							<a href="{!! route('subscriptions.edit', $subscription->id) !!}" class="btn btn-sm btn-default" title="Edit" data-toggle="tooltip">Edit</a>
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
		<div class="text-center">{!! $subscriptions !!}</div>
	</div>
</div>
@stop