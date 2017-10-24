@extends('template.app')
@section('content')

    <div class="col-md-6 card">
        <h3>Deseja excluir esse contato?</h3>
        <div>
            <a class="btn btn-danger" href="{{url("pessoas/$pessoa->id/destroy")}}"><i
                        class="glyphicon  glyphicon-remove">Excluir</i></a>
            <a href="{{url("/pessoas")}}" class="btn btn-primary">
                <i class="glyphicon glyphicon-backward">Cancelar</i>
            </a>
        </div>
    </div>

    <div class="col-md-6 card">
        <div class="card-header">
            {{$pessoa->nome}}
        </div>
        <div class="card-block">
            @foreach($pessoa->telefones as $telefone)
                <p class="card-text"><strong>Telefone: </strong>{{$telefone->ddd}} {{$telefone->telefone}}
                </p>
            @endforeach
        </div>
    </div>


@endsection