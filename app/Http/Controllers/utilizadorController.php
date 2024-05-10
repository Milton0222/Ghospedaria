<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class utilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          $funcionarios=User::where('funcionario','=',1)->get();
        return view('user',compact('funcionarios'));
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
           User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'funcionario'=>1,
            'password'=>Hash::make(123456789)
           ]);

           return redirect()->route('user.index');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
            if($user=User::findorfail($id)){
                  $user->delete();

                  return redirect()->back();
            }else{
                return redirect()->back();
            }
    }
}
