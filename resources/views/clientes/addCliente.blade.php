@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
						
				{!! Form::open(array('route' => 'clientes.store', 'class' => 'form-horizontal', 'method' => 'POST' )) !!}
						<!-- Task Title -->
						<div class="form-group">
							<label for="dni" class="col-sm-3 control-label label-warning">DNI</label>

							<div class="col-sm-6">
								<input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" required>
							</div>
						</div>
						<div class="form-group">
							<label for="apellidos" class="col-sm-3 control-label label-warning">Apellidos</label>

							<div class="col-sm-6">
								<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" required>
							</div>
						</div>
						<div class="form-group">
							<label for="nombres" class="col-sm-3 control-label label-warning">Nombres</label>

							<div class="col-sm-6">
								<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" required>
							</div>
						</div>
						
						
						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<i class="glyphicon glyphicon-plus-sign"></i>Agregar Cliente
								</button>
							</div>
						</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection