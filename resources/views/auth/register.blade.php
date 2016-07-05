@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<b>Registrarse</b>
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Task Form -->
					<form action="register" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Name -->
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label label-warning" required>Nombre</label>

							<div class="col-sm-6">
								<input type="text" name="name" class="form-control" value="{{ old('name') }}">
							</div>
						</div>

						<!-- E-Mail Address -->
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label label-warning" required>Correo</label>

							<div class="col-sm-6">
								<input type="email" name="email" class="form-control" value="{{ old('email') }}">
							</div>
						</div>

						<!-- Password -->
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label label-warning" required>Contraseña</label>

							<div class="col-sm-6">
								<input type="password" name="password" class="form-control">
							</div>
						</div>

						<!-- Confirm Password -->
						<div class="form-group">
							<label for="password_confirmation" class="col-sm-3 control-label label-warning" required>Confirmar Contraseña</label>

							<div class="col-sm-6">
								<input type="password" name="password_confirmation" class="form-control">
							</div>
						</div>

						<!-- Register Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<i class="glyphicon glyphicon-plus"></i>Registrarse
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
