@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
						
				
				{!! Form::model($tipo_producto, ['route' => ['tipo_productos.update', $tipo_producto->tipo_producto_id ], 'method'=>'PUT','class' => 'form-horizontal']) !!}
						
						<!-- Task Title -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Nombre de tipo producto</label>

							<div class="col-sm-6">
								<input type="text" name="nombre_producto" id="book-title" class="form-control" value="{{ $tipo_producto->nombre_producto }}">
							</div>							
						</div>
						
						<!-- Fin de Mostrar empresa -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-btn fa-plus"></i>Guardar	
								</button>
							</div>
						</div>					

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection