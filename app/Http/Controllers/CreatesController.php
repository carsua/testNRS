<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use Storage;

class CreatesController extends Controller
{
	public function home()
    {
    	$reservas = Reserva::all();
    	return view('home',['reservas' => $reservas]);
    }

    public function add(Request $request){
    	
    	//validacion de datos form
    	$this->validate($request,[
    		'inputName' => 'required',
    		'inputDate' => 'required',
    		'inputNum' => 'required',
    		'inputFila' => 'required',
    		'inputColumna' => 'required'
    	]);
    	
    	//Se asignan para guardar en la db
    	$reservas = new Reserva;
    	$reservas->nombre = $request->input('inputName');
    	$reservas->fecha = $request->input('inputDate');
    	$reservas->numero = $request->input('inputNum');
    	$reservas->fila = $request->input('inputFila');
    	$reservas->columna = $request->input('inputColumna');
    	$reservas->save();

    	//add info al log
    	Storage::append("/logs/log.txt", $reservas->fecha." ".$reservas->nombre." Reservo butaca (".$reservas->fila.",".$reservas->columna.")");

    	return redirect('/')->with('info','Reserva exitosa!');

    }

    /**
    * Funcion para descargar log
    **/
    public function downloadFile()
    {
    	$myFile = storage_path()."\app\logs\log.txt";
    	$headers = ['Content-Type: application/txt'];
    	$newName = 'log'.time().'.txt';


    	return response()->download($myFile, $newName, $headers);
    }

    /**
    *
    **/
    public function update($id)
    {
    	$reservas = Reserva::find($id);
    	return view('update',['reservas' => $reservas]);	
    }

    /**
    *
    **/
    public function edit(Request $request)
    {
    	//validacion de datos form
    	$this->validate($request,[
    		'inputName' => 'required',
    		'inputDate' => 'required',
    		'inputNum' => 'required',
    		'inputFila' => 'required',
    		'inputColumna' => 'required'
    	]);
    	//Se preara los datos a guardar
    	$data = array(
    		'nombre' => $request->input('inputName'),
    		'fecha' => $request->input('inputDate'),
    		'numero' => $request->input('inputNum'),
    		'fila' => $request->input('inputFila'),
    		'columna' => $request->input('inputColumna')
    	);
    	
    	//Se busca la reserva ha actualizar
    	Reserva::where('id',$request->input('id'))
    	->update($data);

    	//add info al log
    	Storage::append("/logs/log.txt", $data['fecha']." ".$data['nombre']." Actulizo su reserva (".$data['fila'].",".$data['columna'].")");

    	return redirect('/')->with('info','Reserva Actualizada!');
	
    }

    /**
    *
    **/
    public function read($id)
    {
    	$reservas = Reserva::find($id);
    	return view('read',['reservas' => $reservas]);	
    }

    /**
    *
    **/
    public function delete($id)
    {
    	Reserva::where('id',$id)
    	->delete();
    	return redirect('/')->with('info','Reserva Eliminada!');
    }

}
