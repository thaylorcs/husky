<?php

namespace App\Http\Controllers;

use App\Models\Entrega as Entrega;
use App\Http\Resources\Entrega as EntregaResource;
use Illuminate\Http\Request;

class EntregaController extends Controller
{

    public function index()
    {
        $entregas = Entrega::paginate(15);
        return EntregaResource::collection($entregas);
    }

    public function show($id)
    {
        $entrega = Entrega::findOrFail($id);
        return new EntregaResource($entrega);
    }

    public function store(Request $request)
    {
        $entrega = new Entrega;
        $entrega->cliente = $request->input('cliente');
        $entrega->status = $request->input('status');
        $entrega->ponto_coleta = $request->input('ponto_coleta');
        $entrega->ponto_destino = $request->input('ponto_destino');

        if ($entrega->save()) {
            return new EntregaResource($entrega);
        }
    }

    public function update(Request $request, $id)
    {
        $entrega = Entrega::findOrFail($request->id);
        $entrega->cliente = $request->input('cliente');
        $entrega->status = $request->input('status');
        $entrega->ponto_coleta = $request->input('ponto_coleta');
        $entrega->ponto_destino = $request->input('ponto_destino');

        if ($entrega->save()) {
            return new EntregaResource($entrega);
        }
    }

    public function destroy($id)
    {
        $entrega = Entrega::findOrFail($id);
        if ($entrega->delete()) {
            return new EntregaResource($entrega);
        }
    }
}
