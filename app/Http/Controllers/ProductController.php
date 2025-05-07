<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //pagina inicial
    public function index()
    {
        $produtos = Product::all();
        return view('welcome', ['produtos' => $produtos]);
    }


    //Cadastrar
    //pagina cadastrar
    public function create()
    {
        return view('produtos.cadastrar');
    }
    //acao cadastrar
    public function store(Request $request)
    {
        if ($request->codigo == null) {
            return redirect('/produtos/cadastrar')->with(
                'mensagem1',
                'Produto não pode ter codigo vazio!'
            );
        } else {
            $produto = new Product;
            $produto->codigo = $request->codigo;
            $produto->descricao = $request->descricao;
            $produto->save();

            return redirect('../')->with(
                'mensagem',
                'Cadastrado com sucesso!'
            );
            ;
        }
    }

    //Excluir
    //pagina excluir
    public function deletePage()
    {
        return view('produtos.excluir');
    }
    //acao excluir
    public function destroy(Request $request)
    {

        if ($request->id == null) {
            return redirect('/produtos/excluir')->with(
                'mensagem1',
                'O campo ID não pode ficar em branco !'
            );

        } else {
            $produto = Product::find($request->id);

            if ($produto != null) {
                $produto->delete();
                return redirect('../')->with(
                    'mensagem',
                    'Excluido com sucesso!'
                );
            } else {
                return redirect('/produtos/excluir')->with(
                    'mensagem2',
                    'Não existe produto com ID =' . $request->id . '!'
                );
            }
        }
    }

    //Editar
    //pagina editar
    public function edit()
    {
        return view('produtos.editar');
    }
    //acao editar
    public function update(Request $request)
    {

        if ($request->id == null) {
            return redirect('/produtos/editar')->with(
                'mensagem1',
                'O campo ID não pode ficar em branco !'
            );

        } else {
            $produto = Product::find($request->id);

            if ($produto != null) {

                if ($request->codigo == null) {
                    return redirect('/produtos/editar')->with(
                        'mensagem2',
                        'O codigo do produto não pode ficar vazio!'
                    );
                } else if ($request->codigo == $produto->codigo && $request->descricao == $produto->descricao) {
                    return redirect('/produtos/editar')->with(
                        'mensagem3',
                        'Você não alterou nenhum dado do produto ' . $request->id . '!\nPor favor modifique os valores'
                    );
                } else {
                    $produto->codigo = $request->codigo;
                    $produto->descricao = $request->descricao;
                    $produto->save();

                    return redirect('../')->with(
                        'mensagem',
                        'Editado com sucesso!'
                    );
                }
            } else {
                return redirect('/produtos/editar')->with(
                    'mensagem4',
                    'Não existe produto de ID = ' . $request->id . '!'
                );
            }
        }
    }

    //Listar
    //pagina listar
    public function showList()
    {
        $produtos = Product::all();
        return view('produtos.listar', ['produtos' => $produtos]);
    }
    //acao deletar pela tabela
    public function destroyFromList(Request $request)
    {


        $produto = Product::find($request->id);

        $produto->delete();
        return redirect('/produtos/listar')->with(
            'mensagem',
            'Excluido com sucesso!'
        );


    }

    //Restaurar
    //pagina restaurar
    public function restorePage()
    {
        return view('produtos.restaurar');
    }
    //acao restaurar
    public function restore(Request $request)
    {

        if ($request->id == null) {
            return redirect('/produtos/restaurar')->with(
                'mensagem1',
                'O campo ID não pode ficar em branco !'
            );

        } else {

            $produto = Product::onlyTrashed()->find($request->id);

            if ($produto != null) {
                $produto->restore();
                return redirect('../')->with(
                    'mensagem',
                    'Restaurado com sucesso!'
                );
            } else {
                return redirect('/produtos/restaurar')->with(
                    'mensagem2',
                    'Não existe produto com ID =' . $request->id . ' para ser restaurado !'
                );
            }
        }
    }

    //Mostrar produto especifico
    public function show($id = null)
    {
        $produtos = Product::all();
        return view('produtos.produto', ['id' => $id, 'produtos' => $produtos]);
    }
}
