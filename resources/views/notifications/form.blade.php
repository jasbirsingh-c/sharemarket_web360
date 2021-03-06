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
        {!! Form::model($model, ['files' => true, 'method' => 'PUT', 'route' => ['notifications.update', $model->id]]) !!}
    @else
        {!! Form::open(['files' => true, 'route' => 'notifications.store']) !!}
    @endif
    	<div class="form-group">
	    {!! Form::label('user_id', 'Select Any one:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	    <input type="radio" name="user_selection" value="user_list">User List
	    <?php
	    	foreach ($subscription_data as $key => $subscription)
	    	{ ?>
	    		<input type="radio" name="user_selection" value="<?php echo $key?>"> <?php echo $subscription?>	
	    	<?php 	    		
	    	}
	    ?>
	    </div>
	</div>
	<div class="form-group" id="user_list_div" style="display:none;">
	    {!! Form::label('user_id', 'Select a user:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	    {!! Form::select('user_id',$user_data) !!}
	    </div>
	</div>	
	<div class="form-group">
	    {!! Form::label('title', 'Title:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('title', null, ['class' => 'form-control']) !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('description', 'Description:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('image_url', 'Image Url:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
	    </div>
	</div>
	<div class="form-group">
	    {!! Form::label('type', 'Type:', ['class' => 'col-md-2 control-label']) !!}
	    <div class="col-sm-9">
	        {!! Form::text('type', null, ['class' => 'form-control']) !!}
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
<script type="text/javascript">
	$(document).ready(function() {
			$('input[name="user_selection"]').click(function() {
					if($(this).val() == "user_list")
						$('#user_list_div').show();
					else
						$('#user_list_div').hide();
				});
		});
</script>