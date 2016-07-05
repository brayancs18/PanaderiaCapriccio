<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Venta;
use DB;
use App\Producto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VentaRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class VentaController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $ventas;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(VentaRepository $ventas)
    {
        $this->middleware('auth');

        $this->ventas = $ventas;
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
        $nombreproducto=$request->get('nombreproducto');
            if(isset($nombreproducto))
                {
                     $ventas = Venta::select('venta.venta_id','cliente.apellidos as cliente','cliente.nombres as cliente','producto.nombre as producto','venta.precio','venta.cantidad','venta.total','venta.fecha')
                     ->join('cliente','venta.cliente_id','=','cliente.cliente_id')
                     ->join('producto','venta.codigo','=','producto.codigo')
                     ->where('producto.nombre',$nombreproducto)
                     ->paginate(5);
                } 
                 else{
                     $ventas = Venta::select('venta.venta_id','cliente.apellidos as cliente','cliente.nombres as cliente','producto.nombre as producto','venta.precio','venta.cantidad','venta.total','venta.fecha')
                     ->join('cliente','venta.cliente_id','=','cliente.cliente_id')
                     ->join('producto','venta.codigo','=','producto.codigo')
                     ->paginate(5);
                }

        
        //Redirecting to bookList.blade.php with $allBooks       
        return View('ventas.index', compact('ventas'));
     }
    public function create()
    {
     //
        $clientes=Cliente::all();
        $productos=Producto::all();
        return view('ventas.addVenta',compact('clientes','productos'));
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
   
        $total=$request->input('cantidad')*$request->input('pre');
        /*$cod=$request->input('codigo')
        $pre=Producto::select('precio as producto')
        ->where('producto.codigo',$cod);   */
        $ventas = new Venta;

        $ventas->cliente_id = $request->input('cliente_id');
        $ventas->codigo = $request->input('codigo');
        $ventas->cantidad = $request->input('cantidad');
        $ventas->precio = $request->input('pre');
        $ventas->total =$total;
        $ventas->fecha = $request->input('fecha');
        //$producto = Producto::find();

       
        //$fecha2=date("Y-m-d",strtotime($request->input('fecha_recepcion')));
        //dd($fecha2);
        //$ventas->fecha_recepcion = $fecha2; 
        //dd($ventas->fecha_recepcion);
        
              
        //dd($ventas->archivador);
        $ventas->save();               
        //echo "Guardar";
      return redirect()->route('ventas.index');

    }
    public function show($id)
    {
        //$task = Task::find($id);

         $clientes=Cliente::all();
         $productos=Producto::all();
        /* $task = Task::select('tasks.id','tasks.codigo','tasks.nombre','tasks.apellido', 'tipo_documento.nombre as tipo_documento','tasks.asunto')
            ->where ('tasks.id',$id)
            ->join('tipo_documento','tasks.id_tipo_documento','=','tipo_documento.id_tipo_documento');
        */

        $ventas=DB::table('venta')
        ->select('venta.venta_id','cliente.apellidos as cliente','cliente.nombres as cliente','producto.nombre as producto','venta.cantidad','venta.precio','venta.total','venta.fecha')
        ->where ('venta.venta_id',$id)
        ->join('cliente','venta.cliente_id','=','cliente.cliente_id')
        ->join('producto','venta.codigo','=','producto.codigo')
        ->get();        
        /*puedo recorre por el resultado
        foreach ($tasks as $task) 
        {
            echo $task->id;
        }

        $task_codigo=$tasks.codigo;
         dd($tasks->toArray);*/
        return View('ventas.showVenta', compact('ventas','clientes','productos'));
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
        
         $venta = Venta::find($id);

         $clientes=Cliente::all();

         $productos=Producto::all();
        
               
         //Redirecting to editBook.blade.php with $book variable
         //return view('tasks.editTask',compact('tasks'));
        return View('ventas.editVenta', compact('venta','productos','clientes'));
    }
    public function update($id, request $request)
    {
        $total=$request->input('cantidad')*$request->input('pre');
          //$request->input($total)
        $venta = Venta::find($id);

        $venta->cliente_id = $request->input('cliente_id');
        $venta->codigo = $request->input('codigo');
        $venta->cantidad = $request->input('cantidad');
        $venta->total = $request->input($total);
        $venta->fecha = $request->input('fecha');   
        

        $venta->save();
        //echo "ID".$id;
        //echo "Codigo".$task->codigo;
        return redirect('/ventas');
    }
    public function destroy($venta_id)
    {
             
        Venta::find($venta_id)->delete();
        //Redirecting to index() method

        return redirect('/ventas');
    }
}
