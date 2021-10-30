@extends('layouts.product.more-courses')
@section('product-content')

   @if ($cart)
   <div class="col-md-8">
    @foreach ($cart->items as $course)
    <div class="card mb-2">
        <div class="card-body">
            <div class="card-title"><h5>{{$course['title']}}</h5></div>
            <div class="card-text ">
                    {{$course['price']}} $
                    <form action="{{route('update.product',$course['id'])}}" method="post">
                        @csrf
                        @method("put")
                        <input type="number" name="qty" id="qty" value="{{$course['qty']}}" class="p-1" >
                        <button type="submit" class="btn btn-secondary  "  >Change</button>
                    </form>
                  <form action="{{route('delete.product',$course['id'])}}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger float-right " style="margin-top: -55px" >Remove</button>
                </form>
            </div>
       </div>
    </div>
   @endforeach
   </div>
   <div class="col-md-4 mr-0">
    <div class="order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{$cart->totalQty}}</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>

        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (QTY)</span>
            <strong>{{$cart->totalQty}} <i class="fas fa-shopping-basket"></i></strong>
          </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>{{$cart->totalPrice}} $</strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>

        <a href="{{route('course.checkout',$cart->totalPrice)}}" class="btn btn-primary mt-2 mb-2" >Check Out</a>
      </form>
    </div>

   @else
   <div class="alert alert-danger font-weight-bold " role="alert">
    <i class="fas fa-folder-open"></i>
    YOUR CARTE IS EMPTY !
  </div>

   @endif






@endsection
