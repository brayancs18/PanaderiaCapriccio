<?php

namespace App\Http\Controllers;

use App\Empresa;
use DB;
use App\Tipo_documento;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProveedorRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class EmpresaController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $proveedores, $empresas;

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
         $nombre=$request->get('nombre_empresa');
            if(isset($nombre))
                {
                        $empresas = Empresa::select('empresa.empresa_id', 'empresa.nombre_empresa')
                            ->where('empresa.nombre_empresa',$nombre)
                            ->paginate(3);
                 } 
                 else{
                        $empresas = Empresa::select('empresa.empresa_id', 'empresa.nombre_empresa')
                            ->paginate(3);
                }
               
        //Redirecting to bookList.blade.php with $allBooks       
        return View('empresas.index', compact('empresas'));
        
     }
    public function create()
    {
     //
        return view('empresas.addEmpresa');
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) //Para grabar un nuevo registros
    {
   
        $empresas = new Empresa;
        $empresas->nombre_empresa = $request->input('nombre_empresa');
        $empresas->save();               
        //echo "Guardar";
      return redirect()->route('empresas.index');

    }
    public function show($id) //Mostrar
    {
        //$task = Task::find($id);

        $empresas=DB::table('empresa')
        ->select('empresa.empresa_id','empresa.nombre_empresa')
        ->where ('empresa.empresa_id',$id)
        ->get();  

        //$escuelas = Escuela::select('escuela.escuela_id', 'escuela.nombre_escuela')
          //                   ->paginate(10);      
        
      

        return View('empresas.showEmpresa', compact('empresas'));
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
           $empresa = Empresa::find($id);             
       return View('empresas.editEmpresa', compact('empresa'));
    }
    public function update($id, request $request)
    {
        $empresa = Empresa::find($id);
        $empresa->nombre_empresa = $request['nombre_empresa']; 
        $empresa->save();
        return redirect('/empresas');
    }
    public function destroy($empresa_id) //borar
    {
             
        Empresa::find($empresa_id)->delete();
        //Redirecting to index() method

        return redirect('/empresas');
    }
}