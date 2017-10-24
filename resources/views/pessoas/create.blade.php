@extends('template.app')

@section('content')

    <div class="col-md-12">

        <h3>Novo Contato</h3>
    </div>

    <div class="col-md-6 card">
        <form action="{{ url('pessoas/store')}}" method="POST">
            {{csrf_field()}}
            <br>
            <div class="form-group col-md-12">
                <label class="control-label">Nome</label>
                <input type="text" class="form-control" name="nome">

            </div>

            <div class="form-group col-md-12">
                <label class="control-label">DDD</label>
                <input type="text" class="form-control" name="ddd">

            </div>

            <div class="form-group col-md-12">
                <label class="control-label">Telefone</label>
                <input type="text" class="form-control" name="telefone">

            </div>
            <button type="submit" class="btn btn-primary right">Salvar</button>

        </form>
    </div>

@endsection