@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<b>Ingreso al Sistema</b> 
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Task Form -->
					<form action="login" method="POST" class="form-horizontal">
					
						{{ csrf_field() }}

						<!-- E-Mail Address -->
						<div class="form-group">

							<label for="email" class="col-sm-3 control-label label-warning" required>E-Mail</label>
							<div class="col-sm-6">
								{!! Form::text('email', null, ['class'=>'form-control', 'type'=>'email']) !!}	
								
							</div>
						</div>

						<!-- Password -->
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label label-warning" required>Password</label>

							<div class="col-sm-6">
								{!! Form::password('password', ['class'=>'form-control']) !!}
							</div>
						</div>

						<!-- Login Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<i class="glyphicon glyphicon-ok"></i>ingresar
								</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
