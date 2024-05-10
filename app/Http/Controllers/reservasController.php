<?php

namespace App\Http\Controllers;

use App\Models\hospedes;
use App\Models\quartos;
use App\Models\requisicoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sql="SELECT hospedes.nome,hospedes.telefone,
		quartos.tipologia,quartos.id as 'numero', quartos.valor,
        requisicoes.id,requisicoes.estadia,requisicoes.apagar,requisicoes.duracao,requisicoes.data_hospedagem, requisicoes.created_at
      FROM hospedes JOIN requisicoes on(hospedes.id=requisicoes.hospede)
      				JOIN  quartos on(quartos.id=requisicoes.quarto);";

                    $reservas=DB::select($sql);

        return view('reservas', compact('reservas'));
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
           if( $quartos=quartos::findorfail($request->quarto)){
            $valor=$quartos['valor'];

            if($request->estadia=='dia'){

                requisicoes::create([
                    'duracao'=>$request->duracao,
                    'estadia'=>$request->estadia,
                    'hospede'=>$request->hospede,
                    'funcionario'=>$request->funcionario,
                    'quarto'=>$request->quarto,
                    'apagar'=>$request->duracao * $valor,
                    'data_hospedagem'=>$request->data_hospedagem
                ]);

            }else{

                if($quartos['tipologia'] ='normal'){
                      $pagar=$request->duracao * 1000;
                }elseif($quartos['tipologia']='suit'){
                    $pagar=$request->duracao * 1500;
                }
                requisicoes::create([
                    'duracao'=>$request->duracao,
                    'estadia'=>$request->estadia,
                    'hospede'=>$request->hospede,
                    'funcionario'=>$request->funcionario,
                    'quarto'=>$request->quarto,
                    'apagar'=>$pagar,
                    'data_hospedagem'=>$request->data_hospedagem
                ]);

            }


           }

          return redirect()->route('reserva.index');

   
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //

        $hospedes=hospedes::get();
        $quartos=quartos::where('estado','=','disponivel')->get();
        
        return view('Mostrar.requisitar', compact('hospedes','quartos'));
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
              $reservas=requisicoes::findorfail($id);
              $reservas->delete();

              return redirect()->back();
    }
}
