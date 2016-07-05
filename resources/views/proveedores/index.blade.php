@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-0 col-sm-14">
			<div class="panel panel-info">
				<div class="panel-heading">
					Nuevo Proveedor
				</div>

				<div class="panel-body">

					<!-- Display Validation Errors -->
					@include('common.errors')

					{!! Form::open(array('route' => 'proveedores.index', 'class' => 'form-horizontal', 'class'=>'navbar-form navbar-left pull-right',  'method' => 'GET', 'role'=>'searc' )) !!}

				
					  <div class="form-group">
					    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre de Proveedor']   ) !!}
					  </div>
					<button type="submit" class="btn btn-danger">Buscar</button>
					{!! Form::close() !!}

					<!-- New Task Form -->
					<a class="btn btn-info" href="/PanaderiaCapriccio/public/proveedores/create" role="button">Registrar Proveedor</a>				
				</div>
			</div>

			<!-- Current Tasks -->
			@if (count($proveedores) > 0)
				<div class="panel panel-info">
					<div class="panel-heading">
						Reporte Proveedor 
					</div>

					<div class="panel-body">
						<table class="table table-striped proveedor-table">
							<thead>
								<th>RUC/DNI</th>
								<th>Nombre producto</th>
								<th>Cantidad</th>
								<th>Tipo de producto</th>
								<th>Descripcion</th>
								<th>Empresa</th>
								<th>Nombre del proveedor</th>
								<th>Fecha</th>
								
																								
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($proveedores as $proveedor)
									<tr>
										<td class="table-text">
											<div>{{ $proveedor->ruc_dni}}</div>
									    </td>
										
										<td class="table-text">
											<div>{{ $proveedor->nombre_producto }}</div>
									    </td>
									    	<td class="table-text">
											<div>{{ $proveedor->cantidad }} </div>

										</td>
										<td class="table-text">
											<div>{{ $proveedor->tipo_producto }} </div>
									    </td>
									    <td class="table-text">
											<div>{{ $proveedor->descripcion }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $proveedor->empresa }} </div>
									    </td>
										<td class="table-text">
											<div>{{ $proveedor->apellido }} {{ $proveedor->nombre }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $proveedor->fecha_recepcion }}</div>
									    </td>
										

										<!-- Task Delete Button -->
										<td>
											<form action="/PanaderiaCapriccio/public/proveedores/{{ $proveedor->proveedor_id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-proveedores-{{ $proveedor->proveedor_id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>

										<td>
											<form action="/PanaderiaCapriccio/public/proveedores/{{ $proveedor->proveedor_id }}" method="GET">
												<button type="submit" id="mostrar-{{ $proveedor->proveedor_id }}" class="btn btn-info">
													<i class="btn-info"></i>Mostrar
												</button>
											</form>
										</td>

										<!-- Task Delete Button -->
										<td>
											<form action="proveedores/{{ $proveedor->proveedor_id }}/edit" method="GET">
												<button type="submit" id="mostrar-{{ $proveedor->proveedor_id }}" class="btn btn-info">
													<i class="btn-info"></i>Editar
												</button>
											</form>
										</td>
									</tr>
								@endforeach

								{!!$proveedores->render()!!}
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
