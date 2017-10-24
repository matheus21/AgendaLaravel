@extends('template.app')

@section('content')

    <div class="col-md-12">
        <h3>Editar Contato</h3>
    </div>

    <div class="col-md-6 card">
        <form action="{{ url('pessoas/update')}}" method="POST">
            {{csrf_field()}}
            <br>
            <div class="form-group col-md-12">
                <label class="control-label">Nome</label>
                <input type="text" value="{{$pessoa->nome}}" class="form-control" name="nome">

            </div>
            <button type="submit" class="btn btn-primary right">Salvar</button>
            <input type="hidden" value="{{$pessoa->id}}" name="id">
        </form>
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