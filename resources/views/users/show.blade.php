@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Show User
            <div class="panel-nav pull-right" style="margin-top: -7px;">
                <a href="{!! route('users.edit', $user->id) !!}" class="btn btn-default">Edit</a>
                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
        <table class="table table-stripped table-bordered">
            <tr>
                <td><b>ID</b></td>
                <td>{!! $user->id !!}</td>
            </tr>



            <tr>
                <td><b>Created At</b></td>
                <td>{!! $user->created_at !!}</td>
            </tr>
        </table>
    </div>
@stop