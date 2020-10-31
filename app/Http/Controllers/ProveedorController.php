<?php

namespace App\Http\Controllers;
use App\Entities\Proveedor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index2(Request $request){
        $todos = Proveedor::all();
        echo $todos;
    }

     public function index(Request $request)
     {
        $proveedores = Proveedor::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $proveedores = $proveedores->where('razonSocial','like', '%'.$request->search.'%')
             ->orWhere('nombreCompleto','like', '%'.$request->search.'%')
             ->orWhere('direccion','like', '%'.$request->search.'%')
             ->orWhere('telefono','like', '%'.$request->search.'%')
             ->orWhere('correo','like', '%'.$request->search.'%')
             ->orWhere('rfc','like', '%'.$request->search.'%');
        }

        $proveedores = $proveedores->paginate($limit)->appends($request->all());

        return view('proveedores.index', compact('proveedores')) ;
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new proveedor();
        $proveedor = $this->createUpdateProveedor($request,$proveedor);

        return redirect()
            ->route('proveedores.index')
            ->with('message', 'Se ha creado');
    }

    public function createUpdateProveedor(Request $request, $proveedor){
        $proveedor->razonSocial = $request->razonSocial;
        $proveedor->nombreCompleto = $request->nombreCompleto;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->rfc = $request->rfc;

        $proveedor->save();
        return $proveedor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($proveedor)
    {
        $proveedor = Proveedor::where('id', $proveedor)->firstOrFail();
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($proveedor)
    {
        $proveedor = Proveedor::where('id', $proveedor)->firstOrFail();
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proveedor)
    {
        $proveedor = Proveedor::where('id', $proveedor)->firstOrFail();
        $proveedor = $this->createUpdateProveedor($request,$proveedor);
        return redirect()
            ->route('proveedores.show', $proveedor)
            ->with('message', 'ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($proveedor)
    {
        $proveedor = Proveedor::findOrFail($proveedor);
        $proveedor->delete();
        return redirect()
            ->route('proveedores.index')
            ->with('message', 'Se ha eliminado');

    }

    public function exportPDF(){
        $proveedores = Proveedor::get();
        $pdf = Facade::loadView('proveedores.exportPDF', compact('proveedores'));

        //Linea para descargar PDF
        //return $pdf->download('proveedores.pdf');


        //para visualizar de forma horizontal
        $pdf->setPaper('a4','landscape');
        //Visualizar primero
        return $pdf->stream();
    }
}
