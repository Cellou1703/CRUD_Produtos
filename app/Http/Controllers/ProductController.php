<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $produtos = Product::all();
        return view('welcome', ['produtos' => $produtos]);
    }

    public function cadastrar()
    {
        return view('produtos.cadastrar');
    }

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

            return redirect('../');
        }
    }


    public function excluir()
    {
        return view('produtos.excluir');
    }

    public function destroy(Request $request)
    {

        if ($request->id == null) {
            return redirect('/produtos/restaurar')->with(
                'mensagem1',
                'O campo ID não pode ficar em branco !'
            );

        } else {
            $produto = Product::find($request->id);

            if ($produto != null) {
                $produto->delete();
                return redirect('../');
            } else {
                return redirect('/produtos/excluir')->with(
                    'mensagem2',
                    'Não existe produto com ID =' . $request->id . '!'
                );
            }
        }
    }

    public function listar()
    {
        $produtos = Product::all();
        return view('produtos.listar', ['produtos' => $produtos]);
    }

    public function listarProduto($id = null)
    {
        $produtos = Product::all();
        return view('produtos.produto', ['id' => $id, 'produtos' => $produtos]);
    }

    public function editar()
    {
        return view('produtos.editar');
    }

    public function editarProduto(Request $request)
    {

        if ($request->id == null) {
            return redirect('/produtos/restaurar')->with(
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
                        'Você não alterou nenhum dado do produto ' . $request->id . '! Por favor modifique os valores'
                    );
                } else {
                    $produto->codigo = $request->codigo;
                    $produto->descricao = $request->descricao;
                    $produto->save();

                    return redirect('../');
                }
            } else {
                return redirect('/produtos/editar')->with(
                    'mensagem4',
                    'Não existe produto de ID = ' . $request->id . '!'
                );
            }
        }
    }

    public function restaurar()
    {
        return view('produtos.restaurar');
    }

    public function restaurarProduto(Request $request)
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
                return redirect('../');
            } else {
                return redirect('/produtos/restaurar')->with(
                    'mensagem2',
                    'Não existe produto com ID =' . $request->id . ' !'
                );
            }
        }
    }
}
