@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-info">					           
						
				{!! Form::open(array('route' => 'proveedores.store', 'class' => 'form-horizontal', 'method' => 'POST' )) !!}
						<!-- Task Title -->
						<div class="form-group">
							<label for="ruc_dni" class="col-sm-3 control-label">Ruc/DNI</label>

							<div class="col-sm-6">
								<input type="text" name="ruc_dni" id="book-title" class="form-control" placeholder="Ruc/dni">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Apellido Proveedor</label>

							<div class="col-sm-6">
								<input type="text" name="apellido" id="book-title" class="form-control" placeholder="Apellido">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Nombre Proveedor</label>

							<div class="col-sm-6">
								<input type="text" name="nombre" id="book-title" class="form-control" placeholder="Nombre">
							</div>
						</div>
						<!-- Mostrar escuela -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Empresa</label>

							<div class="col-sm-6">
								  <select class="form-control" name="empresa_id">
								    @foreach($empresas as $empresa)
								      <option value="{{$empresa->empresa_id}}">{{$empresa->nombre_empresa}}</option>
								    @endforeach
								  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Nombre Producto</label>

							<div class="col-sm-6">
								<input type="text" name="nombre_producto" id="book-title" class="form-control" placeholder="Nombre producto">
							</div>
						</div>
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Cantidad</label>

							<div class="col-sm-6">
								<input type="text" name="cantidad" id="book-title" class="form-control" placeholder="cantidad">
							</div>
						</div>

						<!-- Tipo de Documento -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Tipo_Producto</label>
                            <div class="col-sm-6">
								  <select class="form-control" name="tipo_producto_id">
								    @foreach($tipo_productos as $tipo_producto)
								      <option value="{{$tipo_producto->tipo_producto_id}}">{{$tipo_producto->nombre_producto}}</option>
								    @endforeach
								  </select>
							</div>
						</div>


					    <!-- Insertar fecha -->
						<div class="form-group">
							<label for="book-title" class="col-sm-3 control-label">Fecha</label>
                            <div class="col-sm-6">
														
					                <input type="text" name="fecha_recepcion" id="datepicker" class="form-control" size="12" />
					        </div>
						</div>

						
						<!-- Task Description -->
						<div class="form-group">
							<label for="book-description" class="col-sm-3 control-label">Descripción</label>

							<div class="col-sm-6">		
								<textarea name="descripcion" id="book-description" class="form-control" rows="5" placeholder="Descripcion"></textarea>

							</div>
						</div>
						
						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-btn fa-plus"></i>Agregar Producto
								</button>
							</div>
						</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection