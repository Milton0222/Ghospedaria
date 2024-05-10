<x-app-layout>
    @section('corpo')
        <!-- Modal -->
<div class="modal fade" id="departamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="font-size:25px; font-weight:800;  color: rgb(1, 65, 69);" class="modal-title" id="exampleModalLabel"> Cadastro DE Departamento</h2>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-not" action="" method="POST">
          @csrf
          <label  for="">Nome </label>
          <input type="text" placeholder="Nome" name="nome" required>
          <label  for="">Área</label>
          <input type="text"  name="area" required>
          <select name="chefe" id= " " required>
            <option  selected >selecionar</option>
       
           <option value=""></option>
         
          </select>
          
          <div class="modal-footer">
        <button type="submit" class="bttn btn-primary">Cadastrar</button>
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
                  <h1 style="font-size:25px">Reservas</h1>
                 </div>
                 <div class="pesquisar">
               
                  <form action="" method="get">
               
             <a   class="not-cadastr" href="{{route('requisitar.show')}}"><i class="fa-solid fa-plus"></i></a>
          
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
                    <th scope="col">Cliente</th>
                    <th scope="col">Contacto</th>
               
                    <th scope="col">Tipologia</th>
                    <th scope="col">Valor</th>
                   
                  
                    <th scope="col">Estádia</th>
                    <th scope="col">Data da Hospedagem</th>
                    <th scope="col">Data da Reserva</th>
                    <th scope="col">Metodo</th>
                   
                  </tr>
                </thead>
                <tbody>
              @foreach($reservas as $lista)
                  <tr>
                    <th scope="row">{{$lista->id}}</th>
                    <td>{{$lista->nome}}</td>
                    <td>{{$lista->telefone}}</td>
                    <td>{{$lista->tipologia}}</td>
                    <td>{{$lista->valor}}</td>
                
             
                    <td>{{$lista->estadia}}</td>
                    <td>{{$lista->data_hospedagem}}</td>
                    <td>{{$lista->created_at}}</td>
                    <td class=" mettodos">
                      
                      <div class="btn-group " role="group" aria-label="First group">
                     
                       <a type="" data-bs-toggle="modal" data-bs-target="#departamentoModal{{$lista->id}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                       <!--  <button type="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#departamentoModal"><i class="bi bi-person-lines-fill"></i></button>-->

                        <!--    Modal actualizar -->
                            <div class="modal fade" id="departamentoModal{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes da reserva nº {{$lista->id}}</h5>
                                    <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-not" action="" method="PUT">
                                      @csrf
                                          <table class="table">
                                      
                                                <tbody>
                                                     <tr>
                                                      <th>Apagar: <strong>{{$lista->apagar}}</strong></th>
                                                     </tr>
                                                     <tr>
                                                     <th>Nº do quarto: {{$lista->numero}}</th>
                                                     </tr>
                                                     <tr>
                                                        <th>Tipoloogia: <strong>{{$lista->tipologia}}</strong></th>
                                                     </tr>
                                                     <tr>
                                                     <th>Duração da Hospedagem: {{$lista->duracao}}/{{$lista->estadia}}</th>
                                                     </tr>
                                                </tbody>
                                          </table>
                                    </form>  
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
   <!--Modal actualizar fim -->

                        <button type="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#departaapagar{{$lista->id}}"><i class="bi bi-trash"></i></button>
  <!-- Modal appagar -->
                         <div class="modal fade" id="departaapagar{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: red; color: white;">
                                    <h5 class="modal-title" id="exampleModalLabel">Apagar Reserva nº {{$lista->id}}</h5>
                                    <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body" style="background-color:black; color:white">
                                    <form class="form-not" action="{{route('reserva.destroy',$lista->id)}}" method="DELETE">

                                         <h1>DESEJA APAGAR O ITEM SELECIONADO?</h1>
                                      
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