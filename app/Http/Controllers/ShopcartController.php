<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AutomotiveParts;
use Session;

class ShopcartController extends Controller
{
    public function get(Request $request){
        /**Lista todos os itens do carrinho */
        $cart = collect($request->session()->get('cart','o carrinho está vazio'));
        $cart->push(['total'=> $cart->sum(function($value){
            return $value['price'] * $value['amount'];
        })]);
        return $cart;
    }

    public function create(Request $request){
        /**Adiciona itens ao carrinho, caso exista, incrementa a quantidade*/
        $automotiveParts = AutomotiveParts::find($request->id);
        $cart = collect($request->session()->get('cart'));

        if(!$automotiveParts)
            return response()->json(['error'=> 'produto não cadastrado']);

        if(!$cart->contains('id',$request->id))
            $request->session()->push('cart',$automotiveParts);


        $cart = collect($request->session()->get('cart'))->map(function($product, $index) use($request) {
            if($product['id'] == $request->id){
                $product['amount'] += 1;
                return $product;
            }
            return $product;
        })->push(['total'=> $cart->sum(function($value){
            return $value['price'] * $value['amount'];
        })]);

        return $cart;
    }

    public function update(Request $request){
        /*editar a quantidade de itens de um produto(parametros amount, id)*/
        $automotiveParts = AutomotiveParts::find($request->id);
        $cart = collect($request->session()->get('cart'));

        if(!$automotiveParts)
            return response()->json(['error'=> 'produto não cadastrado']);

        $cart = collect($request->session()->get('cart'))->map(function($product, $index) use($request) {
            if($product['id'] == $request->id){
                $product['amount'] = $request->amount;
                return $product;
            }
            return $product;
        })->push(['total'=> $cart->sum(function($value){
            return $value['price'] * $value['amount'];
        })]);

        return $cart;
    }

    public function delete(Request $request){
        /*Remover todos os itens do carrinho*/
        $request->session()->get('cart');
    }

}
