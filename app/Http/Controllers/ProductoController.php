<?php

namespace App\Http\Controllers;
use App\Entities\Producto;
use App\Entities\Proveedor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedores = Proveedor::select('*')->get();
        $productos = Producto::select('*');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $productos = $productos->where('nombre','like', '%'.$request->search.'%')
             ->orWhere('descripcion','like', '%'.$request->search.'%')
             ->orWhere('precio','like', '%'.$request->search.'%')
             ->orWhere('expiracion','like', '%'.$request->search.'%')
             ->orWhere('stock','like', '%'.$request->search.'%');
        }

        $productos = $productos->paginate($limit)->appends($request->all());

        return view('productos.index', compact('productos','proveedores')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::select('*')->get();
        return view('productos.create',compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new producto();
        $producto = $this->createUpdateProducto($request,$producto);

        return redirect()
            ->route('productos.index')
            ->with('message', 'Se ha creado');
    }


    public function createUpdateProducto(Request $request, $producto){
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->expiracion = $request->expiracion;
        $producto->stock = $request->stock;
        $producto->idProveedor = $request->idProveedor;

        $producto->save();
        return $producto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        $producto = Producto::where('id', $producto)->firstOrFail();
        $proveedor= Proveedor::where('id', $producto->idProveedor)->firstOrFail();
        //return view('productos.show', compact('producto'));

        return view('productos.show', compact('producto','proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        $proveedores = Proveedor::select('*')->get();
        $producto = Producto::where('id', $producto)->firstOrFail();
        return view('productos.edit',compact('producto','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto)
    {
        $producto = Producto::where('id', $producto)->firstOrFail();
        $producto = $this->createUpdateProducto($request,$producto);
        return redirect()
            ->route('productos.index', $producto)
            ->with('message', 'ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto)
    {
        $producto = Producto::findOrFail($producto);
        $producto->delete();
        return redirect()
            ->route('productos.index')
            ->with('message', 'Se ha eliminado');
    }

    public function exportPDF(){
        $productos = Producto::get();
        $proveedores = Proveedor::get();
        $pdf = Facade::loadView('productos.exportPDF', compact('productos','proveedores'));

        //Linea para descargar PDF
        //return $pdf->download('proveedores.pdf');


        //para visualizar de forma horizontal
        $pdf->setPaper('a4','landscape');
        //Visualizar primero
        return $pdf->stream();
    }
}
