@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
				
				@foreach ($proveedores as $proveedor)			

					{!! Form::model($proveedor, ['route' => ['proveedores.index'], 'method'=>'GET','class' => 'form-horizontal']) !!}
							<div class="form-group">
							<label for="ruc_dni" class="col-sm-3 control-label">Ruc/DNI</label>

							<div class="col-sm-6">
								<input type="text" name="ruc_dni" id="book-title" class="form-control" value="{{ $proveedor->ruc_dni }}">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Apellido Proveedor</label>

							<div class="col-sm-6">
								<input type="text" name="apellido" id="book-title" class="form-control" value="{{ $proveedor->apellido }}">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Nombre Proveedor</label>

							<div class="col-sm-6">
								<input type="text" name="nombre" id="book-title" class="form-control" value="{{ $proveedor->nombre }}">
							</div>
						</div>

						<!-- Mostrar escuela -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Empresa</label>
                            <div class="col-sm-6">

							<input type="text" name="empresa" id="book-title" class="form-control" value="{{ $proveedor->empresa }}">
							</div>
						</div>
					
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Nombre Producto</label>

							<div class="col-sm-6">
								<input type="text" name="nombre_producto" id="book-title" class="form-control" value="{{ $proveedor->nombre_producto }}">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Cantidad</label>

							<div class="col-sm-6">
								<input type="text" name="cantidad" id="book-title" class="form-control" value="{{ $proveedor->cantidad }}">
							</div>
						</div>

						<!-- Tipo de Documento -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Tipo_Producto</label>
                            <div class="col-sm-6">

							<input type="text" name="tipo_producto" id="book-title" class="form-control" value="{{ $proveedor->tipo_producto }}">
							</div>
						</div>


					    <!-- Insertar fecha -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Fecha</label>
                            <div class="col-sm-6">
														
					                <input type="text" name="fecha_recepcion" id="datepicker" class="form-control" size="12" value="{{ $proveedor->fecha_recepcion }}"/>
					        </div>
						</div>
						<div class="form-group">
							<label for="book-description" class="col-sm-3 control-label">Descripción</label>

							<div class="col-sm-6">		
								<textarea name="descripcion" id="book-description" class="form-control" rows="5">{{ $proveedor->descripcion }}</textarea>

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