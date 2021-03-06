<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
use Illuminate\Http\Request;

class PessoasController extends Controller
{


    private $pessoa;

    /**
     * @var TelefonesController
     * Injeção de dependencias
     */
    private $telefones_controller;

    public function __construct(TelefonesController $telefones_controller)
    {

        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();

    }

    /**
     * Metodo para listar pessoas, usando metodos do Eloquent,
     * pega a lista de pessoas e retorna o metodo view, passando a view (model.metodo) e um array de chave / valor
     * com o nome da model no plural => variavel com a lista.
     */

    public function index()
    {

        $list_pessoas = Pessoa::all();
        return view('pessoas.index', [
            'pessoas' => $list_pessoas
        ]);
    }

    public function novoView()
    {

        return view('pessoas.create');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Função para salvar pessoas, salva também um telefone através da injeção de dependencia
     */

    public function store(Request $request)
    {

        $pessoa = Pessoa::create($request->all());

        if ($request->ddd && $request->telefone) {
            $telefone = new Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->telefone = $request->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }

        return redirect('/pessoas')->with("message", "Pessoa criada com sucesso");

    }

    public function editarView($id)
    {


        return view('pessoas.edit', [
            'pessoa' => $this->getPessoa($id)
        ]);

    }

    protected function getPessoa($id)
    {
        return $this->pessoa->find($id);
    }

    public function update(Request $request)
    {

        $pessoa = $this->getPessoa($request->id);
        $pessoa->update($request->all());
        return redirect('/pessoas');

    }

    public function excluirView($id) {

        return view('pessoas.delete', [

            'pessoa' => $this->getPessoa($id)
        ]);

    }

    public function destroy($id) {

        $this->getPessoa($id)->delete();
        return redirect(url('pessoas'))->with('success', 'Excluido');
    }
}
