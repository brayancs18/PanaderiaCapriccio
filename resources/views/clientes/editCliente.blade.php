@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">					           
						<p>
				
				{!! Form::model($cliente, ['route' => ['clientes.update', $cliente->cliente_id ], 'method'=>'PUT','class' => 'form-horizontal']) !!}
						
						<!-- Task Title -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">DNI</label>

							<div class="col-sm-6">
								<input type="text" name="dni" id="book-title" class="form-control" value="{{ $cliente->dni }}">
							</div>							
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Apellidos</label>

							<div class="col-sm-6">
								<input type="text" name="apellidos" id="book-title" class="form-control" value="{{ $cliente->apellidos }}">
							</div>							
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Nombre de la cliente</label>

							<div class="col-sm-6">
								<input type="text" name="nombres" id="book-title" class="form-control" value="{{ $cliente->nombres }}" >
							</div>							
						</div>
						
						<!-- Fin de Mostrar cliente -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<img src="/PanaderiaCapriccio/iconos/technology.png" width="20" height="20">Guardar	
								</button>
							</div>
						</div>					

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection