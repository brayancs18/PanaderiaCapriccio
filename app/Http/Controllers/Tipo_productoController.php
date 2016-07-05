<?php

namespace App\Http\Controllers;

use App\Empresa;
use DB;
use App\Tipo_producto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProveedorRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class Tipo_productoController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $proveedores, $tipo_productos;

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
         $nombre=$request->get('nombre_producto');
            if(isset($nombre))
                {
                        $tipo_productos = Tipo_producto::select('tipo_producto.tipo_producto_id', 'tipo_producto.nombre_producto')
                            ->where('tipo_producto.nombre_producto',$nombre)
                            ->paginate(3);
                 } 
                 else{
                        $tipo_productos = Tipo_producto::select('tipo_producto.tipo_producto_id', 'tipo_producto.nombre_producto')
                            ->paginate(3);
                }
               
        //Redirecting to bookList.blade.php with $allBooks       
        return View('tipo_productos.index', compact('tipo_productos'));
        
     }
    public function create()
    {
     //
        return view('tipo_productos.addTipo_producto');
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) //Para grabar un nuevo registros
    {
   
        $tipo_productos = new Tipo_producto;
        $tipo_productos->nombre_producto = $request->input('nombre_producto');
        $tipo_productos->save();               
        //echo "Guardar";
      return redirect()->route('tipo_productos.index');

    }
    public function show($id) //Mostrar
    {
        //$task = Task::find($id);

        $tipo_productos=DB::table('tipo_producto')
        ->select('tipo_producto.tipo_producto_id','tipo_producto.nombre_producto')
        ->where ('tipo_producto.tipo_producto_id',$id)
        ->get();  

        //$escuelas = Escuela::select('escuela.escuela_id', 'escuela.nombre_escuela')
          //                   ->paginate(10);      
        
      

        return View('tipo_productos.showTipo_producto', compact('tipo_productos'));
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
           $tipo_producto = Tipo_producto::find($id);             
       return View('tipo_productos.editTipo_producto', compact('tipo_producto'));
    }
    public function update($id, request $request)
    {
        $tipo_producto = Tipo_producto::find($id);
        $tipo_producto->nombre_producto = $request['nombre_producto']; 
        $tipo_producto->save();
        return redirect('/tipo_productos');
    }
    public function destroy($tipo_producto_id) //borar
    {
             
        Tipo_producto::find($tipo_producto_id)->delete();
        //Redirecting to index() method

        return redirect('/tipo_productos');
    }
}