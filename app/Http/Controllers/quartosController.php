<?php

namespace App\Http\Controllers;

use App\Models\quartos;
use Illuminate\Http\Request;

class quartosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quartos=quartos::get();
        return view('quartos',compact('quartos'));
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
            quartos::create($request->all());

            return redirect()->route('quarto.index');
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
            if($quarto=quartos::findorfail($id)){
                  $quarto->update([
                    'valor'=>$request->valor,
                    'tipologia'=>$request->tipologia,
                    'estado'=>$request->estado

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
           if($quarto=quartos::findorfail($id)){
                 $quarto->delete();
                 return redirect()->back();
           }else{
            return redirect()->back();
           }
    }
}
