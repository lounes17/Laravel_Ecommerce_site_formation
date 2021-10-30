@extends('layouts.product.more-courses')
@section('product-content')
<div class="row">
    <div class="col-md-12">
        @foreach ($carts as $cart)
    <div class="card mb-3">
      <div class="card-body">
        <table class="table table-striped mt-2 mb-2">
            <thead>
                <th class="col">Title</th>
                <th class="col">Price</th>
                <th class="col">Quantity</th>
                <th class="col">status</th>
            </thead>
            <tbody>
                @foreach ($cart->items as $item)
                  <tr>
                   <td> {{$item['title']}}</td>
                   <td> ${{$item['price']}}</td>
                   <td> {{$item['qty']}}</td>
                   <td> Paid</td>
                  </tr>

               @endforeach

            </tbody>

        </table>
      </div>
  </div>
  <p class="badge badge-pill badge-primary p-2">Total Price: ${{$cart->totalPrice}}</p>
@endforeach
    </div>
</div>






@endsection
