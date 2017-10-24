@extends("template.app")
@section('content')

    <div>
        @foreach($pessoas as $pessoa)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{$pessoa->nome}}
                        <a href="{{url("/pessoas/$pessoa->id/editar")}}" class="btn btn-primary">
                            <i class="glyphicon-pencil"></i>
                        </a>
                        <a href="{{url("/pessoas/$pessoa->id/excluir")}}" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>

                    </div>
                    <div class="card-block">
                        @foreach($pessoa->telefones as $telefone)
                            <p class="card-text"><strong>Telefone: </strong>{{$telefone->ddd}} {{$telefone->telefone}}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    </div>
@endsection