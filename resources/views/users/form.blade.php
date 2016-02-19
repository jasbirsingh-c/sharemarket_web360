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
        {!! Form::model($model, ['files' => true, 'method' => 'PUT', 'route' => ['users.update', $model->id]]) !!}
    @else
        {!! Form::open(['files' => true, 'route' => 'users.store']) !!}
    @endif
    	<div class="form-group">
	    {!! Form::label('name', 'Name:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('name', null, ['class' => 'form-control']) !!}
	    </div>
	</div>	<div class="form-group">
	    {!! Form::label('contact_no', 'Contact No:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('contact_no', null, ['class' => 'form-control']) !!}
	    </div>
	</div>	<div class="form-group">
	    {!! Form::label('email', 'Email:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	    @if (isset($model))
	        {!! Form::email('email', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
	    @else    
	    	{!! Form::email('email', null, ['class' => 'form-control']) !!}	
    	@endif
	    </div>
	</div>	<!--<div class="form-group">
	    {!! Form::label('password', 'Password:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::password('password', ['class' => 'form-control']) !!}
	    </div>
	</div>	 <div class="form-group">
	    {!! Form::label('token', 'Token:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('token', null, ['class' => 'form-control']) !!}
	    </div>
	</div>	<div class="form-group">
	    {!! Form::label('device_id', 'Device Id:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('device_id', null, ['class' => 'form-control']) !!}
	    </div>
	</div>	<div class="form-group">
	    {!! Form::label('os_type', 'Os Type:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('os_type', null, ['class' => 'form-control']) !!}
	    </div>
	</div> -->	<div class="form-group">
	    {!! Form::label('subscription', 'Subscription:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        <!-- <select name="subscription">
	        <?php
	        	/*foreach($subscription as $key=>$val)
	        	{ ?>
	        			<option value="<?php echo $val['id']?>"><?php echo $val['subscription_name']?></option>
	        		<?php 
	        	}*/
	        ?>	        	
	        </select> -->
	        {!! Form::select('subscription',$subscription) !!}
	    </div>
	</div>	<div class="form-group">
	    {!! Form::label('start_date', 'Start Date:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('start_date', null, ['class' => 'form-control']) !!}
	    </div>
	</div>	<div class="form-group">
	    {!! Form::label('end_date', 'End Date:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('end_date', null, ['class' => 'form-control']) !!}
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
<link href="http://sharemarket.web360.co.in/css/jquery-ui.css" rel="stylesheet">
<script src="http://sharemarket.web360.co.in/js/jquery-ui.min.js"></script>
<script>
  $(function() {
    $( "#start_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#end_date" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
  });
  </script>