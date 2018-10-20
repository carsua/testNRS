@include('inc.header')
	
	<div class="container">
		<div class="row">
			<legend>Reservas</legend>
			@if (session('info'))
				<div class="alert alert-success">
					{{ session('info') }}
				</div>
			@endif
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Personas</th>
			      <th scope="col">Butacas</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  @if(count($reservas) > 0)
			  	@foreach ($reservas->all() as $reserva)
			  		
			  <tbody>
			    <tr>
			      <th scope="row">{{ $reserva->id }}</th>
			      <td>{{ $reserva->nombre }}</td>
			      <td>{{ $reserva->fecha }}</td>
			      <td>{{ $reserva->numero }}</td>
			      <td>({{ $reserva->fila }},{{ $reserva->columna }})</td>
			      <td>
			      	<a href="{{ url("/read/{$reserva->id}") }}" class="btn btn-primary">Ver</a> |
			      	<a href='{{ url("/update/{$reserva->id}") }}' class="btn btn-success">Editar</a> |
			      	<a href="{{ url("/delete/{$reserva->id}") }}" class="btn btn-danger">Eliminar</a>
			      </td>
			    </tr>
			    @endforeach
			@endif
			  </tbody>
			</table> 
		</div>
	</div>

@include('inc.footer')