@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
						
				{!! Form::open(array('route' => 'tipo_productos.store', 'class' => 'form-horizontal', 'method' => 'POST' )) !!}
						<!-- Task Title -->
						<div class="form-group">
							<label for="nombre_producto" class="col-sm-3 control-label">Nombre de Tipo de producto</label>

							<div class="col-sm-6">
								<input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Nombre de Tipo producto">
							</div>
						</div>
						
						
						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-btn fa-plus"></i>Agregar Tipo Producto
								</button>
							</div>
						</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection