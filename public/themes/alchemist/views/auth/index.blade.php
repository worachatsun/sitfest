<div class="page-content">
  <div class="col-md-12">
    <div class="portlet light">

      <div class="portlet-title">
  				<div class="caption font-red-sunglo">
  					<i class="icon-settings font-red-sunglo"></i>
  					<span class="caption-subject bold uppercase"> Register</span>
  				</div>
  		</div>
      <div class="portlet-body form">
        @if ($errors->has())
          <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach
          </div>
        @endif
          {{ Form::open(array('url' => '/register/index','class'=>'form-horizontal margin-bottom-40')) }}
          <div class="form-body">
          	<div class="form-group form-md-line-input">
          		<label for="inputPassword1" class="col-md-2 control-label">Student ID</label>
          		<div class="col-md-4">
          			<div class="input-icon right">
                  <input type="text" class="form-control" placeholder="Student ID" name="std_id" value="{{ old('std_id')}}">
          				<div class="form-control-focus">
          				</div>
          				<i class="fa fa-key"></i>
          			</div>
          			<div class="help-block">
          				 with right aligned icon
          			</div>
          		</div>
          	</div>
          	<div class="form-group">
          		<div class="col-md-offset-2 col-md-10">
          			<button type="submit" class="btn green">Sign in</button>
          		</div>
          	</div>
            </div>
          {{ Form::close() }}
        </div>
    </div>
  </div>
</div>
