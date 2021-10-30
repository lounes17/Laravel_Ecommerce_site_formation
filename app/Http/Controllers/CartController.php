<?php

namespace App\Http\Controllers;

use App\Cart as CartApp;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Course;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(session()->has('cart')){
            $cart=new CartApp(session()->get('cart'));

        }else{
            $cart=null;
        }
        return view('layouts.product.shoppingcart')->with(['cart'=>$cart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Success Title', 'Success Message');

        //
        $product=Course::find($request->id);

        if(session()->has('cart')){
            $cart=new CartApp(session()->get('cart'));

        }else{
            $cart=new CartApp();
        }
        $cart->add( $product);
        session()->put('cart',$cart);
        return redirect(route('more-course'))->with('success','le produit a été bien ajouté à votre panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
