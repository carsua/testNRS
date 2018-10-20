@include('inc.header')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('insert') }}">
					{{ csrf_field() }}
				  <fieldset>
				    <br>
				    <legend>Ingrese los datos</legend>
				    @if(count($errors)>0)
				    	@foreach ($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{ $error }}
				    		</div>
				    	@endforeach
				    @endif
				    <br>
				    <div class="form-group">
				      <label for="inputName">Nombre Completo</label>
				      <input type="text" class="form-control" id="inputName" name="inputName" aria-describedby="nameHelp" placeholder="Ingrese Nombre Completo">
				      <small id="nameHelp" class="form-text text-muted">Sus datos nombre no sera compartidos</small>
				    </div>
				    <div class="form-group">
				      <label for="inputDate">Fecha</label>
				      <input type="date" class="form-control" id="inputDate" name="inputDate">
				    </div>
				    <div class="form-group">
				      <label for="inputNum">Numero Personas</label>
				      <input type="number" class="form-control" id="inputNum" name="inputNum" min="0">
				    </div>
				    
				    <div class="form-group">
				      <label for="inputFila">Fila</label>
				      <select class="form-control" id="inputFila" name="inputFila">
				        <option>1</option>
				        <option>2</option>
				        <option>3</option>
				        <option>4</option>
				        <option>5</option>
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="inputColumna">Columna</label>
				      <select class="form-control" id="inputColumna" name="inputColumna">
				        <option>1</option>
				        <option>2</option>
				        <option>3</option>
				        <option>4</option>
				        <option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
				      </select>
				    </div>
				    
				    <button type="submit" class="btn btn-primary">Submit</button>
				    <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
@include('inc.footer')