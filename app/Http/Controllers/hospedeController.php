<?php

namespace App\Http\Controllers;

use App\Models\hospedes;
use Illuminate\Http\Request;

class hospedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $hospedes=hospedes::get();
        return view('hospedes', compact('hospedes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
                hospedes::create($request->all());

                return redirect()->route('hospede.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
           if($hospede=hospedes::findorfail($id)){
                  $hospede->update([
                    'nome'=>$request->nome,
                    'telefone'=>$request->telefone
                  ]);

                  return redirect()->back();
           }else{
            return redirect()->back();
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          if($hospede=hospedes::findorfail($id)){
                $hospede->delete();

                return redirect()->back();
          }else{
            return redirect()->back();
          }
    }
}
