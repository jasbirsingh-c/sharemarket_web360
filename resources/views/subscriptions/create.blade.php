@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Add New Subscription
            <div class="panel-nav pull-right" style="margin-top: -7px;">
                <a href="{!! route('subscriptions.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
        <div class="panel-body">
            @include('subscriptions.form')
        </div>
    </div>

@stop