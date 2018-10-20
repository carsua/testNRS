@include('inc.header')
	<div class="container">
		<div class="row">
			<legend>Reserva:</legend>
			<label>{{ $reservas->nombre }} </label> 
			<label>{{ $reservas->fecha }} </label>	
			<label>({{ $reservas->fila }},{{ $reservas->columna }})</label>	
		</div>
	</div>
@include('inc.footer')