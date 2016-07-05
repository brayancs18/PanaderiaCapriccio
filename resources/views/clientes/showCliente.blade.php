@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
			<p>					           
				
				@foreach ($clientes as $cliente)			

					{!! Form::model($cliente, ['route' => ['clientes.index'], 'method'=>'GET','class' => 'form-horizontal']) !!}
						<div class="form-group">
							<label for="codigo" class="col-sm-3 control-label label-warning">Codigo</label>

							<div class="col-sm-6">
								<input type="text" name="codigo" id="book-title" class="form-control" value="{{ $cliente->cliente_id }}" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="dni" class="col-sm-3 control-label label-warning">DNI</label>

							<div class="col-sm-6">
								<input type="text" name="dni" id="book-title" class="form-control" value="{{ $cliente->dni }}" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="apellidos" class="col-sm-3 control-label label-warning">Apellidos</label>

							<div class="col-sm-6">
								<input type="text" name="apellidos" id="book-title" class="form-control" value="{{ $cliente->apellidos }}" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label label-warning">Nombres</label>

							<div class="col-sm-6">
								<input type="text" name="nombres" id="book-title" class="form-control" value="{{ $cliente->nombres }}" disabled="disabled">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-success">
									<i class="glyphicon glyphicon-chevron-left"></i>Regresar	
								</button>
							</div>
						</div>					

				{!! Form::close() !!}									    
				@endforeach
				</form>
			</div>
		</div>
	</div>
@endsection