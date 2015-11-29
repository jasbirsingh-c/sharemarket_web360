@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Show Subscription
            <div class="panel-nav pull-right" style="margin-top: -7px;">
                <a href="{!! route('subscriptions.edit', $subscription->id) !!}" class="btn btn-default">Edit</a>
                <a href="{!! route('subscriptions.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
        <table class="table table-stripped table-bordered">
            <tr>
                <td><b>ID</b></td>
                <td>{!! $subscription->id !!}</td>
            </tr>

			<tr>
                <td><b>Subscription_name</b></td>
                <td>{!! $subscription->subscription_name !!}</td>
            </tr>			<tr>
                <td><b>Description</b></td>
                <td>{!! $subscription->description !!}</td>
            </tr>			<tr>
                <td><b>Amt</b></td>
                <td>{!! $subscription->amt !!}</td>
            </tr>			<tr>
                <td><b>Segment</b></td>
                <td>{!! $subscription->segment !!}</td>
            </tr>			<tr>
                <td><b>Msg_delivery</b></td>
                <td>{!! $subscription->msg_delivery !!}</td>
            </tr>			<tr>
                <td><b>Jackpot_calls</b></td>
                <td>{!! $subscription->jackpot_calls !!}</td>
            </tr>			<tr>
                <td><b>Earlier_calls</b></td>
                <td>{!! $subscription->earlier_calls !!}</td>
            </tr>			<tr>
                <td><b>Telephonic_support</b></td>
                <td>{!! $subscription->telephonic_support !!}</td>
            </tr>			<tr>
                <td><b>Client_query</b></td>
                <td>{!! $subscription->client_query !!}</td>
            </tr>			<tr>
                <td><b>Msg_on_alert</b></td>
                <td>{!! $subscription->msg_on_alert !!}</td>
            </tr>

            <tr>
                <td><b>Created At</b></td>
                <td>{!! $subscription->created_at !!}</td>
            </tr>
        </table>
    </div>
@stop