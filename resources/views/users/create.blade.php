@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Add New User
            <div class="panel-nav pull-right" style="margin-top: -7px;">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
        <div class="panel-body">
            @include('users.form')
        </div>
    </div>

@stop