<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente = Client::all();
        return response([
            'data' => ClientResource::collection($cliente),
            'status' => true
        ], 200);
    }

     /**
     * Store a newly created resource in storage.
     *
     *  @param  app\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $cliente = Client::create($request->all());
       
        return response([
            'data' => new ClientResource($cliente),
            'status' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'data' => new ClientResource(Client::find($id)),
            'status' => true
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
   
     * @param  app\Http\Requests\ClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $cliente = Client::find($id);
        $cliente->update($request->all());
        return response([
            'data' => new ClientResource($cliente),
            'status' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return response(null, 204);
    }

    /**
     * Update status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function updateStatus(Request $request, $id)
   /* {
        $status = false;
        $acondicionamento = Acondicionamento::find($id);
        if ($request->has('ativo') && in_array($request->ativo, [1, 0])) {
            $acondicionamento->update($request->all());
            $status = true;
        }

        return response([
            'status' => $status
        ], 200);
    }
    */
}
