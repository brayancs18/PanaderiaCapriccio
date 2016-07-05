<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Proveedor;
use DB;
use App\Tipo_producto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Repositories\ProveedorRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProveedorController extends Controller
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
     public function prueba()
    {
     //
        echo "Prueba";
        //return view('tasks.addTask',compact('escuelas','tipo_documentos'));
    }
   
    public function index(Request $request)
    { 
        $nombre=$request->get('nombre');
            if(isset($nombre))
                {
                     $proveedores = Proveedor::select('proveedor.proveedor_id','proveedor.ruc_dni','proveedor.nombre_producto','proveedor.cantidad','proveedor.descripcion','proveedor.nombre','proveedor.apellido','proveedor.fecha_recepcion','tipo_producto.nombre_producto as tipo_producto','empresa.nombre_empresa as empresa')
                     ->join('tipo_producto','proveedor.tipo_producto_id','=','tipo_producto.tipo_producto_id')
                     ->join('empresa','proveedor.empresa_id','=','empresa.empresa_id')
                     ->where('proveedor.nombre',$nombre)
                     ->paginate(5);
                } 
                 else{
                     $proveedores = Proveedor::select('proveedor.proveedor_id','proveedor.ruc_dni','proveedor.nombre_producto','proveedor.cantidad','proveedor.descripcion','proveedor.nombre','proveedor.apellido','proveedor.fecha_recepcion','tipo_producto.nombre_producto as tipo_producto','empresa.nombre_empresa as empresa')
                     ->join('tipo_producto','proveedor.tipo_producto_id','=','tipo_producto.tipo_producto_id')
                     ->join('empresa','proveedor.empresa_id','=','empresa.empresa_id')
                     ->paginate(5);
                }

        
        //Redirecting to bookList.blade.php with $allBooks       
        return View('proveedores.index', compact('proveedores'));
     }
    public function create()
    {
     //
        $empresas=Empresa::all();
        $tipo_productos=Tipo_producto::all();
        return view('proveedores.addProveedor',compact('empresas','tipo_productos'));
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
   
        $proveedores = new Proveedor;
        $proveedores->ruc_dni = $request->input('ruc_dni');
        $proveedores->apellido = $request->input('apellido');
        $proveedores->nombre = $request->input('nombre');
        $proveedores->empresa_id = $request->input('empresa_id');
        $proveedores->nombre_producto = $request->input('nombre_producto');
        $proveedores->cantidad = $request->input('cantidad');
        $proveedores->tipo_producto_id = $request->input('tipo_producto_id');
        $proveedores->fecha_recepcion=$request->input('fecha_recepcion'); 
        $proveedores->descripcion = $request->input('descripcion'); 

       
        //$fecha2=date("Y-m-d",strtotime($request->input('fecha_recepcion')));
        //dd($fecha2);
        //$proveedores->fecha_recepcion = $fecha2; 
        //dd($proveedores->fecha_recepcion);
        
              
        //dd($proveedores->archivador);
        $proveedores->save();               
        //echo "Guardar";
      return redirect()->route('proveedores.index');

    }
    public function show($id)
    {
        //$task = Task::find($id);

         $empresas=Empresa::all();
         $tipo_productos=Tipo_producto::all();
        /* $task = Task::select('tasks.id','tasks.codigo','tasks.nombre','tasks.apellido', 'tipo_documento.nombre as tipo_documento','tasks.asunto')
            ->where ('tasks.id',$id)
            ->join('tipo_documento','tasks.id_tipo_documento','=','tipo_documento.id_tipo_documento');
        */

        $proveedores=DB::table('proveedor')
        ->select('proveedor.proveedor_id','proveedor.ruc_dni','proveedor.nombre_producto','proveedor.cantidad','proveedor.descripcion','proveedor.nombre','proveedor.apellido','proveedor.fecha_recepcion','tipo_producto.nombre_producto as tipo_producto','empresa.nombre_empresa as empresa')
        ->where ('proveedor.proveedor_id',$id)
        ->join('tipo_producto','proveedor.tipo_producto_id','=','tipo_producto.tipo_producto_id')
        ->join('empresa','proveedor.empresa_id','=','empresa.empresa_id')
        ->get();        
        /*puedo recorre por el resultado
        foreach ($tasks as $task) 
        {
            echo $task->id;
        }

        $task_codigo=$tasks.codigo;
         dd($tasks->toArray);*/
        return View('proveedores.showProveedor', compact('proveedores','empresas','tipo_productos'));
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
        //
        
         $proveedor = Proveedor::find($id);

         $empresas=Empresa::all();

         $tipo_productos=Tipo_producto::all();
        
               
         //Redirecting to editBook.blade.php with $book variable
         //return view('tasks.editTask',compact('tasks'));
        return View('proveedores.editProveedor', compact('proveedor','tipo_productos','empresas'));
    }
    public function update($id, request $request)
    {
        $proveedor = Proveedor::find($id);

        $proveedor->ruc_dni = $request->input('ruc_dni');
        $proveedor->apellido = $request->input('apellido');
        $proveedor->nombre = $request->input('nombre');
        $proveedor->empresa_id = $request->input('empresa_id');
        $proveedor->nombre_producto = $request->input('nombre_producto');
        $proveedor->cantidad = $request->input('cantidad');
        $proveedor->tipo_producto_id = $request->input('tipo_producto_id');
        $proveedor->fecha_recepcion=$request->input('fecha_recepcion'); 
        $proveedor->descripcion = $request->input('descripcion');  
        

        $proveedor->save();
        //echo "ID".$id;
        //echo "Codigo".$task->codigo;
        return redirect('/proveedores');
    }
    public function destroy($proveedor_id)
    {
             
        Proveedor::find($proveedor_id)->delete();
        //Redirecting to index() method

        return redirect('/proveedores');
    }
}
