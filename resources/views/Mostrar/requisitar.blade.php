<x-app-layout>
    @section('corpo')

<div  class="main">
            <div class="cabeca">
            @if(Auth::user()->funcionario)
                <a href="{{route('reserva.index')}}">Reservas</a>
                <a href="{{route('hospede.index')}}">Hospedes</a>
                <a href="{{route('quarto.index')}}">Quartos</a>
                @endif
             </div>
    <form class="form-not" action="{{route('requisitar.store')}}" method="POST">
          @csrf
          <label  for="">Data Hospedagem </label>
          <input type="date" placeholder="Informe a data de hospedagem" name="data_hospedagem" required>
          <label  for="">Duração</label>
          <input type="number"  name="duracao" placeholder="Informe o tempo de hospedagem em hora." required>

          <select name="estadia" id= " " required>
            <option  selected >selecionar Estádia</option>
           <option value="hora">Hora</option>
           <option value="dia">Dia</option>
          </select>
          <select name="hospede" id= " " required>
            <option  selected >selecionar Hospede</option>
            @foreach($hospedes as $listah)
           <option value="{{$listah->id}}">{{$listah->nome}}</option>
           @endforeach
          </select>
          <select name="quarto" id= " " required>
            <option  selected >selecionar Quarto</option>
            @foreach($quartos as $listaq)
           <option value="{{$listaq->id}}">Nº {{$listaq->id}}=>{{$listaq->tipologia}} = {{$listaq->valor}},00 Kz</option>
           @endforeach
          </select>
          <select name="funcionario" id= " " required>
            <option  selected value="{{Auth::user()->id}}" >{{Auth::user()->name}}</option>
          </select>
          
          <div class="modal-footer">
        <button type="submit" class="bttn btn-primary">Reservar</button>
      </div>
  </form>  
            </div>
    @endsection
</x-app-layout>