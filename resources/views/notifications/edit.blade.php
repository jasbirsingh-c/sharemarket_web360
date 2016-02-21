@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Notification
            <div class="panel-nav pull-right" style="margin-top: -7px;">
                <a href="{!! route('notifications.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
        <div class="panel-body">
            @include('notifications.form', ['model' => $notification])
        </div>
    </div>

@stop