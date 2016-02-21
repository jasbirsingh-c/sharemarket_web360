@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Show Notification
            <div class="panel-nav pull-right" style="margin-top: -7px;">
                <a href="{!! route('notifications.edit', $notification->id) !!}" class="btn btn-default">Edit</a>
                <a href="{!! route('notifications.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
        <table class="table table-stripped table-bordered">
            <tr>
                <td><b>ID</b></td>
                <td>{!! $notification->id !!}</td>
            </tr>

			<tr>
                <td><b>User_id</b></td>
                <td>{!! $notification->user_id !!}</td>
            </tr>			<tr>
                <td><b>Title</b></td>
                <td>{!! $notification->title !!}</td>
            </tr>			<tr>
                <td><b>Description</b></td>
                <td>{!! $notification->description !!}</td>
            </tr>			<tr>
                <td><b>Image_url</b></td>
                <td>{!! $notification->image_url !!}</td>
            </tr>			<tr>
                <td><b>Type</b></td>
                <td>{!! $notification->type !!}</td>
            </tr>

            <tr>
                <td><b>Created At</b></td>
                <td>{!! $notification->created_at !!}</td>
            </tr>
        </table>
    </div>
@stop