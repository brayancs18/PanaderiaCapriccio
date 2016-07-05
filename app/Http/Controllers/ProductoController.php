<?php

namespace App\Http\Controllers;

use App\Cliente;
use DB;
use App\Producto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProveedorRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $proveedores, $productos;

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
         $nombre=$request->get('nombre');
            if(isset($nombre))
                {
                        $productos = Producto::select('producto.codigo','producto.nombre','producto.precio','producto.stock')
                            ->where('producto.nombre',$nombre)
                            ->paginate(5);
                 } 
                 else{
                        $productos = Producto::select('producto.codigo','producto.nombre','producto.precio','producto.stock')
                            ->paginate(5);
                }
               
        //Redirecting to bookList.blade.php with $allBooks       
        return View('productos.index', compact('productos'));
        
     }
    public function create()
    {
     //
        return view('productos.addProducto');
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) //Para grabar un nuevo registros
    {
   
        $productos = new Producto;
        $productos->nombre = $request->input('nombre');
        $productos->precio = $request->input('precio');
        $productos->stock = $request->input('stock');
        $productos->save();               
        //echo "Guardar";
      return redirect()->route('productos.index');

    }
    public function show($id) //Mostrar
    {
        //$task = Task::find($id);

        $productos=DB::table('producto')
        ->select('producto.codigo','producto.nombre','producto.precio','producto.stock')
        ->where ('producto.codigo',$id)
        ->get();  

        //$escuelas = Escuela::select('escuela.escuela_id', 'escuela.nombre_escuela')
          //                   ->paginate(10);      
        
      

        return View('productos.showProducto', compact('productos'));
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
           $producto = Producto::find($id);             
       return View('productos.editProducto', compact('producto'));
    }
    public function update($id, request $request)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request['nombre'];
        $producto->precio = $request['precio'];
        $producto->stock = $request['stock'];
        $producto->save();
        return redirect('/productos');
    }
    public function destroy($codigo) //borar
    {
             
        Producto::find($codigo)->delete();
        //Redirecting to index() method

        return redirect('/productos');
    }
}