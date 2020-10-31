<?php

namespace App\Http\Controllers;
use App\Entities\Cliente;
use App\Entities\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::select('*');
        $productos = Producto::select('*');

        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $clientes = $clientes->where('nombre','like', '%'.$request->search.'%')
             ->orWhere('apellidoPaterno','like', '%'.$request->search.'%')
             ->orWhere('apellidoMaterno','like', '%'.$request->search.'%')
             ->orWhere('rfc','like', '%'.$request->search.'%')
             ->orWhere('telefono','like', '%'.$request->search.'%')
             ->orWhere('correo','like', '%'.$request->search.'%')
             ->orWhere('direccion','like', '%'.$request->search.'%')
             ->orWhere('idProducto','like', '%'.$request->search.'%');
        }

        $clientes = $clientes->paginate($limit)->appends($request->all());

        return view('clientes.index', compact('clientes','productos')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::select('*')->get();
        return view('clientes.create',compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new cliente();
        $cliente = $this->createUpdateCliente($request,$cliente);

        return redirect()
            ->route('clientes.index')
            ->with('message', 'Se ha creado');
    }

    public function createUpdateCliente(Request $request, $cliente){
        $cliente->nombre = $request->nombre;
        $cliente->apellidoPaterno = $request->apellidoPaterno;
        $cliente->apellidoMaterno = $request->apellidoMaterno;
        $cliente->rfc = $request->rfc;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->idProducto = $request->idProducto;

        $cliente->save();
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        $productos = Producto::select('*')->get();
        $cliente = Cliente::where('id', $cliente)->firstOrFail();
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cliente)
    {
        $cliente = Cliente::where('id', $cliente)->firstOrFail();
        $productos = Producto::select('*')->get();
        return view('clientes.edit', compact('cliente','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente)
    {
        $cliente = Cliente::where('id', $cliente)->firstOrFail();
        $cliente = $this->createUpdateCliente($request,$cliente);
        return redirect()
            ->route('clientes.show', $cliente)
            ->with('message', 'ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente)
    {
        $cliente = Cliente::findOrFail($cliente);
        $cliente->delete();
        return redirect()
            ->route('clientes.index')
            ->with('message', 'Se ha eliminado');
    }

    public function exportPDF(){
        $clientes = Cliente::get();
        $productos = Producto::get();
        $pdf = Facade::loadView('clientes.exportPDF', compact('clientes','productos'));

        //Linea para descargar PDF
        //return $pdf->download('clientes.pdf');


        //para visualizar de forma horizontal
        $pdf->setPaper('a4','landscape');
        //Visualizar primero
        return $pdf->stream();
    }
}
