<x-app-layout>
    <!--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>-->
@section('corpo')
    <div class="cabec" >

<div class="divv-box">
    <div class="div-icon">
        <i class="fa-solid fa-newspaper"></i>
    </div>
    <div class="div-textos">
        <strong>+{{$quartos}}</strong>
        <p>Quartos</p>
        @if(Auth::user()->funcionario)
        <a href="{{route('quarto.index')}}">ver</a>
        @endif
    </div>
</div>


<div class="divv-box">
    <div class="div-icon">
        <i class="fa-solid fa-newspaper"></i>
    </div>
    <div class="div-textos">
        <strong>+{{$reservas}}</strong>
        <p>Reservas</p>
        @if(Auth::user()->funcionario)
        <a href="{{route('reserva.index')}}">ver</a>
   @endif
    </div>
</div>


<div class="divv-box">
    <div class="div-icon">
        <i class="fa-solid fa-newspaper"></i>
    </div>
    <div class="div-textos">
        <strong>+{{$hospedes}}</strong>
        <p>Hospedes</p>
        @if(Auth::user()->funcionario)
        <a href="{{route('hospede.index')}}">ver</a>
        @endif
    </div>
</div>

</div>
        
@endsection
</x-app-layout>
