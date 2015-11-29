@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-horizontal">
    @if (isset($model))
        {!! Form::model($model, ['files' => true, 'method' => 'PUT', 'route' => ['subscriptions.update', $model->id]]) !!}
        <input type="hidden" name="segment" value="0">
        <input type="hidden" name="msg_delivery" value="0">
        <input type="hidden" name="jackpot_calls" value="0">
        <input type="hidden" name="earlier_calls" value="0">
        <input type="hidden" name="telephonic_support" value="0">
        <input type="hidden" name="client_query" value="0">
        <input type="hidden" name="msg_on_alert" value="0">
    @else
        {!! Form::open(['files' => true, 'route' => 'subscriptions.store']) !!}
    @endif
    	<div class="form-group">
	    {!! Form::label('subscription_name', 'Subscription Name:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('subscription_name', null, ['class' => 'form-control']) !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('description', 'Description:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('amt', 'Amt:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('amt', null, ['class' => 'form-control']) !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('segment', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('segment') !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('msg_delivery', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('msg_delivery') !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('jackpot_calls', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('jackpot_calls') !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('earlier_calls', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('earlier_calls') !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('telephonic_support', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('telephonic_support') !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('client_query', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('client_query') !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('msg_on_alert', '', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::checkbox('msg_on_alert') !!}
	    </div>
	</div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-sm-9">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>