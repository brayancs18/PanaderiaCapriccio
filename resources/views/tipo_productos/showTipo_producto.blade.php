@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
				
				@foreach ($tipo_productos as $tipo_producto)			

					{!! Form::model($tipo_producto, ['route' => ['tipo_productos.index'], 'method'=>'GET','class' => 'form-horizontal']) !!}
						<div class="form-group">
							<label for="codigo" class="col-sm-3 control-label">Codigo</label>

							<div class="col-sm-6">
								<input type="text" name="codigo" id="book-title" class="form-control" value="{{ $tipo_producto->tipo_producto_id }}">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Tipo Producto</label>

							<div class="col-sm-6">
								<input type="text" name="Tipo Producto" id="book-title" class="form-control" value="{{ $tipo_producto->nombre_producto }}">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-btn fa-plus"></i>Regresar	
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