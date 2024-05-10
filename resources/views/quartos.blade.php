<x-app-layout>
    @section('corpo')
        <!-- Modal -->
<div class="modal fade" id="departamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="font-size:25px; font-weight:800;  color: rgb(1, 65, 69);" class="modal-title" id="exampleModalLabel">Registar Quarto</h2>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-not" action="{{route('quarto.store')}}" method="POST">
          @csrf
          <label  for="">Preço </label>
          <input type="text" placeholder="Informe o preço do quarto" name="valor" required>
          
          <select name="tipologia" id= " " required>
            <option >Selecionar tipologia</option>
           <option value="suite">Suite</option>
           <option value="normal">Normal</option>
          </select>
          
          <div class="modal-footer">
        <button type="submit" class="bttn btn-primary">Salvar</button>
      </div>
        </form>  
      </div>
      
    </div>
  </div>
</div>
   <!-- Modal -->



   
      <div class="main">
             <div class="cabeca">
             @if(Auth::user()->funcionario)
                 <a href="{{route('reserva.index')}}">Reservas</a>
                <a href="{{route('hospede.index')}}">Hospedes</a>
                <a href="{{route('quarto.index')}}">Quartos</a>
                @endif
             </div>

             <div class="div-noticias">
              <div class="notic-header">
                 <div class="noti-titulo">
                  <h1 style="font-size:25px">Quartos</h1>
                 </div>
                 <div class="pesquisar">
               
                  <form action="" method="get">
               
             <a data-bs-toggle="modal" data-bs-target="#departamentoModal" class="not-cadastr" href=""><i class="fa-solid fa-plus"></i></a>
          
                  <input placeholder="pesquisar" type="text" name="search" required>
                 <button type="submit">ir</button>
                  </form>
                
                 </div>
              </div>
              <div class="tabella" style="overflow-x:auto;">
              <table class="table">
                <thead>
                  <tr>
                  <th scope="col">Nº</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                  <th scope="col">Estado</th>
                    <th scope="col">Metodo</th>
                   
                  </tr>
                </thead>
                <tbody>
              @foreach($quartos as $lista)
                  <tr>
                    <th scope="row">{{$lista->id}}</th>
                    <td>{{$lista->tipologia}}</td>
                    <td>{{$lista->valor}}</td>
                  <td>{{$lista->estado}}</td>
                    <td class=" mettodos">
                      
                      <div class="btn-group " role="group" aria-label="First group">
                     
                    <!-- <a type="" href="" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>-->
                        <button type="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#departamentoModal{{$lista->id}}"><i class="bi bi-person-lines-fill"></i></button>

                            <!-- Modal actualizar -->
                            <div class="modal fade" id="departamentoModal{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Quarto {{$lista->id}}</h5>
                                    <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-not" action="{{route('quarto.update',$lista->id)}}" method="PUT">
                                      @csrf
                                      <input type="text" placeholder="" name="valor" value="{{$lista->valor}}" required >
                                    
                                      <select name="estado" id= " " required>
                                        <option  selected value="{{$lista->estado}}" > {{$lista->estado}}</option>
                                        <option value="disponivel">Disponivel</option>
                                        <option value="ocupado">Ocupado</option>
                                   
                                      </select>
                                      <select name="tipologia" id= " " required>
                                        <option  selected value="{{$lista->tipologia}}" > {{$lista->tipologia}}</option>
                                        <option value="suite">Suite</option>
                                        <option value="normal">Normal</option>
                                   
                                      </select>
                                      
                                      <div class="modal-footer">
                                    <button type="submit" class="bttn btn-primary">Salvar</button>
                                  </div>
                                    </form>  
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
   <!-- Modal actualizar fim -->

                        <button type="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#departaapagar{{$lista->id}}"><i class="bi bi-trash"></i></button>
  <!-- Modal appagar -->
                         <div class="modal fade" id="departaapagar{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: red; color: white;">
                                    <h5 class="modal-title" id="exampleModalLabel">Apagar Quarto Nº {{$lista->id}}</h5>
                                    <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body" style="background-color:black; color:white">
                                    <form class="form-not" action="{{route('quarto.delete',$lista->id)}}" method="DELETE">

                                         <h1>DESEJA APAGAR O quaro nº {{$lista->id}}?</h1>
                                      
                                      <div class="modal-footer" style="color: black;">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                          <button type="submit" class="btn btn-danger">sim</button>
                                  </div>
                                    </form>  
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
   <!-- Modal apagar fim -->
                             
  
                      </div>
                    </td>
                  
                  </tr>
             @endforeach

                </tbody>
              </table>

             </div>
      </div>


    
    @endsection
</x-app-layout>