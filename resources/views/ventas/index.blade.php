@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-0 col-sm-14">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<b>Nueva Venta</b>
				</div>

				<div class="panel-body">

					<!-- Display Validation Errors -->
					@include('common.errors')

					{!! Form::open(array('route' => 'ventas.index', 'class' => 'form-horizontal', 'class'=>'navbar-form navbar-left pull-right',  'method' => 'GET', 'role'=>'searc' )) !!}

				
					  <div class="form-group">
					    {!! Form::text('nombreproducto',null,['class'=>'form-control', 'placeholder'=>'Nombre de Producto']   ) !!}
					  </div>
					<button type="submit" class="btn btn-success"><img src="/PanaderiaCapriccio/iconos/worldwide.png" width="20" height="20">Buscar</button>
					{!! Form::close() !!}

					<!-- New Task Form -->
					<a class="btn btn-warning" href="/PanaderiaCapriccio/public/ventas/create" role="button"><img src="/PanaderiaCapriccio/iconos/add.png" width="20" height="20">Registrar Venta</a>				
				</div>
			</div>

			<!-- Current Tasks -->
			@if (count($ventas) > 0)
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>Reporte Proveedor</b> 
					</div>

					<div class="panel-body label-warning">
						<table class="table table-striped venta-table">
							<thead>
								<th>N° de Venta</th>
								<th>Datos Cliente</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Total</th>
								<th>Fecha</th>
								
																								
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($ventas as $venta)
									<tr>
										<td class="table-text">
											<div>{{ $venta->venta_id}}</div>
									    </td>
										
										<td class="table-text">
											<div>{{ $venta->cliente}}</div>
									    </td>
									    	<td class="table-text">
											<div>{{ $venta->producto }} </div>

										</td>
										<td class="table-text">
											<div>{{ $venta->cantidad }} </div>
									    </td>
									    <td class="table-text">
											<div>{{ $venta->precio }} </div>
									    </td>
									    <td class="table-text">
											<div>{{ $venta->total }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $venta->fecha }} </div>
									    </td>
										
										

										<!-- Task Delete Button -->
										<td>
											<form action="/PanaderiaCapriccio/public/ventas/{{ $venta->venta_id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-ventas-{{ $venta->venta_id }}" class="btn btn-danger">
													<img src="/PanaderiaCapriccio/iconos/delete.png" width="20" height="20">Delete
												</button>
											</form>
										</td>

										

										<!-- Task Delete Button -->
										<td>
											<form action="ventas/{{ $venta->venta_id }}/edit" method="GET">
												<button type="submit" id="mostrar-{{ $venta->venta_id }}" class="btn btn-success">
													<img src="/PanaderiaCapriccio/iconos/settings.png" width="20" height="20">Editar
												</button>
											</form>
										</td>
									</tr>
								@endforeach

								{!!$ventas->render()!!}
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
