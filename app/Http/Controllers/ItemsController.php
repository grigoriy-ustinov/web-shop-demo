<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Item;
use App\Cart;
use DB;
use View;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('layouts.shop', ['items' => $items]);
    }

    public function adminView()
    {
        $items = Item::all();

        return View::make('layouts.admin')
            ->with('items', $items);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'price'=> 'required',
            'description' => 'required'
        ]);

        $item = new Item;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->save();

        return redirect('/adminView')->with('success', 'Item '. $item->name .' added');
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
    public function delete($id)
    {
         // delete
         $item = Item::find($id);
         $item->delete();
 
         // redirect
         return redirect('/adminView')->with('success', 'Item '. $item->name .' has been removed');
    }

    public function addToCart(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item, $item->id);
        $request->session()->put('cart', $cart);
        return redirect('/shop')->with('success', 'Item '. $item->name .' has been added to the cart');
    }

    public function showCart()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('layouts.checkout', ['items' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $itemToRemove = $cart->find($id);

        $cart->remove($id);
        $request->session()->put('cart', $cart);
        return redirect('/checkout')->with('success', 'Item '. $itemToRemove['name'] .' has been removed from the cart');
    }


    public function destroy($id)
    {
        //
    }
}
