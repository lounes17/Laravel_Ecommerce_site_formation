<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    //
    public $items=[];
    public $totalQty;
    public $totalPrice;
    public function __construct($cart = null)
    {
        if($cart){
            $this->items=$cart->items;
            $this->totalQty=$cart->totalQty;
            $this->totalPrice=$cart->totalPrice;
        }else{
            $this->items=[];
            $this->totalQty=0;
            $this->totalPrice=0;
        }
    }
    public function add(Course $course){
        $item=[
            'id'=> $course->id,
            'title'=> $course->title,
            'price'=> $course->price,
            'qty'=> 0,
            'image'=> $course->image,
        ];
        if(!array_key_exists($course->id,$this->items)){
            $this->items[$course->id]=$item;
            $this->totalQty +=1;
            $this->totalPrice +=$course->price;
        }else{
            $this->totalQty +=1;
            $this->totalPrice +=$course->price;
        }
        $this->items[$course->id]['qty'] += 1;
    }
    public function remove($id)
    {
        #
        if(array_key_exists($id,$this->items)){
            $this->totalQty-=$this->items[$id]['qty'];
            $this->totalPrice-=$this->items[$id]['qty']*$this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }
    public function updateQty($id,$qty){
        //rest qty and price
        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalPrice-=$this->items[$id]['price']*$this->items[$id]['qty'];
        ///add items wiiiiiiiith new qty
        $this->items[$id]['qty']=$qty;
        ///total qty
        $this->totalQty+=$qty;
        $this->totalPrice+=$this->items[$id]['price']*$qty;
    }
}
