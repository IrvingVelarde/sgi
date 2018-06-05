<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getreport() {
        $categories = Category::where('project_id',1)->get(); 
        return view('report')->with(compact('categories'));
    }
    public function postreport(Request $request) {
        /* $rules = [
            'category_id' => 'required|sometimes:categories,id',
            'severity'    => 'required|in:M,N,A',
            'title'       => 'required|min:5',
            'description' => 'required|min:15'
        ];*/
        $messages = [
            'category_id.required' => 'Eliga una Categoria de la Incidencia por favor',
            'severity.required'    => 'Eliga una Severidad de la Incidencia por favor',
            'title.required'       => 'El campo Titulo de la Incidencia es requerido y ademas tiene que ingresar mas de 5 letras',
            'title.min'            => 'El campo Titulo debe tener :min caracteres',
            'description.required' => 'El campo Descripción de la Incidencia es requerido y ademas tiene que ingresar mas de 15 letras',
            'description.min'      => 'El campo Descripción de la Incidencia debe tener :min caracteres',
        ];
        //$this->validate($request,$rules,$messages);
        $request->validate([
            'category_id' => 'required|sometimes:categories,id',
            'severity'    => 'required|in:M,N,A',
            'title'       => 'required|min:5',
            'description' => 'required|min:15'
        ],$messages);
        $incident = new Incident();
        $incident->category_id = $request->input('category_id')?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $incident->client_id = auth()->user()->id;
        $incident->save();
        return back();


    }
}
