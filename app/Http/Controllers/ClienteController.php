<?php

namespace App\Http\Controllers;

use App\Cliente;
use DB;
use App\Tipo_documento;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProveedorRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ClienteController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $proveedores, $clientes;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(ProveedorRepository $proveedores)
    {
        $this->middleware('auth');

        $this->proveedores = $proveedores;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function index(Request $request)
    { 
         $apellido=$request->get('apellidos');
            if(isset($apellido))
                {
                        $clientes = Cliente::select('cliente.cliente_id','cliente.dni','cliente.apellidos','cliente.nombres')
                            ->where('cliente.apellidos',$apellido)
                            ->paginate(3);
                 } 
                 else{
                        $clientes = Cliente::select('cliente.cliente_id','cliente.dni','cliente.apellidos','cliente.nombres')
                            ->paginate(3);
                }
               
        //Redirecting to bookList.blade.php with $allBooks       
        return View('clientes.index', compact('clientes'));
        
     }
    public function create()
    {
     //
        return view('clientes.addCliente');
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) //Para grabar un nuevo registros
    {
         
        $clientes = new Cliente;
        $clientes->dni = $request->input('dni');
        $clientes->apellidos = $request->input('apellidos');
        $clientes->nombres = $request->input('nombres');
        $clientes->save();               
        //echo "Guardar";
      return redirect()->route('clientes.index');

    }
    public function show($id) //Mostrar
    {
        //$task = Task::find($id);

        $clientes=DB::table('cliente')
        ->select('cliente.cliente_id','cliente.dni','cliente.apellidos','cliente.nombres')
        ->where ('cliente.cliente_id',$id)
        ->get();  

        //$escuelas = Escuela::select('escuela.escuela_id', 'escuela.nombre_escuela')
          //                   ->paginate(10);      
        
      

        return View('clientes.showCliente', compact('clientes'));
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
   public function edit($id)
    {
           $cliente = Cliente::find($id);             
       return View('clientes.editCliente', compact('cliente'));
    }
    public function update($id, request $request)
    {
        $cliente = Cliente::find($id);
        $cliente->dni = $request['dni'];
        $cliente->apellidos = $request['apellidos'];
        $cliente->nombres = $request['nombres'];
        $cliente->save();
        return redirect('/clientes');
    }
    public function destroy($cliente_id) //borar
    {
             
        Cliente::find($cliente_id)->delete();
        //Redirecting to index() method

        return redirect('/clientes');
    }
}