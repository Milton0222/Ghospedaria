<x-app-layout>
    @section('corpo')
        <!-- Modal -->
<div class="modal fade" id="departamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="font-size:25px; font-weight:800;  color: rgb(1, 65, 69);" class="modal-title" id="exampleModalLabel">Registar Hospede</h2>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-not" action="{{route('hospede.store')}}" method="POST">
          @csrf
          <label  for="">Nome </label>
          <input type="text" placeholder="Informe o nome do cliente" name="nome" required>
          <label  for="">Contacto</label>
          <input type="number"  name="telefone" placeholder="Informe o conttacto do cliente" required>
         <select name="genero" id= " " required>
            <option  selected >selecionar genero</option>
       
           <option value="Masculino">Masculino</option>
           <option value="Femenino">Femenino</option>
         
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
                  <h1 style="font-size:25px">Hospedes</h1>
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
                  <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Metodo</th>
                   
                  </tr>
                </thead>
                <tbody>
              @foreach($hospedes as $lista)
                  <tr>
                    <th scope="row">{{$lista->id}}</th>
                    <td>{{$lista->nome}}</td>
                    <td>{{$lista->telefone}}</td>
                    <td>{{$lista->genero}}</td>
                    <td class=" mettodos">
                      
                      <div class="btn-group " role="group" aria-label="First group">
                     
                   <!--    <a type="" href="" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>-->
                        <button type="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#departamentoModal{{$lista->id}}"><i class="bi bi-person-lines-fill"></i></button>

                            <!-- Modal actualizar -->
                            <div class="modal fade" id="departamentoModal{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Hospede {{$lista->nome}}</h5>
                                    <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-not" action="{{route('hospede.update',$lista->id)}}" method="PUT">
                                      @csrf
                                      <input type="text" placeholder="Nome" name="nome" value="{{$lista->nome}}" required >
                                      <input type="number" placeholder="Conttacto" name="telefone" value="{{$lista->telefone}}" required>
                                      
                                      
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
                                    <h5 class="modal-title" id="exampleModalLabel">Apagar {{$lista->nome}}</h5>
                                    <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body" style="background-color:black; color:white">
                                    <form class="form-not" action="{{route('hospede.destroy',$lista->id)}}" method="DELETE">

                                         <h1>DESEJA APAGAR O {{$lista->nome}}?</h1>
                                      
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