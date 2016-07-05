@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<b>Nuevo Cliente</b>
				</div>

				<div class="panel-body">

					<!-- Display Validation Errors -->
					@include('common.errors')

					{!! Form::open(array('route' => 'clientes.index', 'class' => 'form-horizontal', 'class'=>'navbar-form navbar-left pull-right',  'method' => 'GET', 'role'=>'searc' )) !!}
					
					  <div class="form-group">
					    {!! Form::text('apellidos',null,['class'=>'form-control', 'placeholder'=>'Apellido Cliente']   ) !!}
					  </div>
					  <button type="submit" class="btn btn-success"><img src="/PanaderiaCapriccio/iconos/worldwide.png" width="20" height="20">Buscar</button>
					{!! Form::close() !!}

					<!-- New Task Form -->
					<a class="btn btn-warning" href="/PanaderiaCapriccio/public/clientes/create" role="button"><img src="/PanaderiaCapriccio/iconos/add.png" width="20" height="20">Registrar Cliente</a>				
				</div>
			</div>

			<!-- Current escuelas -->
			@if (count($clientes) > 0)
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>Reporte Clientes</b>  
					</div>

					<div class="panel-body label-warning">
						<table class="table table-striped cliente-table">
							<thead>
								<th>Id</th>
								<th>DNI</th>
								<th>Apellidos Cliente</th>
								<th>Nombres Cliente</th>
						
							</thead>
							<tbody>
								@foreach ($clientes as $cliente)
									<tr>
										
										<td class="table-text">
											<div>{{ $cliente->cliente_id }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $cliente->dni }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $cliente->apellidos }}</div>
									    </td>
									    <td class="table-text">
											<div>{{ $cliente->nombres }}</div>
									    </td>
										

										<!-- Task Delete Button -->
										<td>
											<form action="/PanaderiaCapriccio/public/clientes/{{ $cliente->cliente_id  }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-clientes-{{ $cliente->cliente_id  }}" class="btn btn-danger">
													<img src="/PanaderiaCapriccio/iconos/delete.png" width="20" height="20">Delete
												</button>
											</form>
										</td>

										<td>
											<form action="/PanaderiaCapriccio/public/clientes/{{ $cliente->cliente_id  }}" method="GET">
												<button type="submit" id="mostrar-{{ $cliente->cliente_id  }}" class="btn btn-primary">
													<img src="/PanaderiaCapriccio/iconos/eye.png" width="20" height="20">Mostrar
												</button>
											</form>
										</td>

										<!-- Task Delete Button -->
										<td>
											<form action="clientes/{{ $cliente->cliente_id  }}/edit" method="GET">
												<button type="submit" id="mostrar-{{ $cliente->cliente_id  }}" class="btn btn-success">
													<img src="/PanaderiaCapriccio/iconos/settings.png" width="20" height="20">Editar
												</button>
											</form>
										</td>
									</tr>
								@endforeach

								{!!$clientes->render()!!}
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
