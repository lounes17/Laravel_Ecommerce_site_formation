<div class="card" >
        <div class="card">
          <div class="card-header" id="headingTwo">
             <h5 class="mb-0">
                 <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#address" aria-expanded="true" aria-controls="address">
                       <div class="card-title">Address</div>
                   </button>
              </h5>
          </div>
          <div id='address' class="collapse">
            <div class="card-body">
                <form action="{{route('update-address')}}" method="POST">
                    @csrf
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                                <label for="street_number">Street Number</label>
                           <input type="text" class="form-control" id="street_number"  name="street_number" placeholder="Street Number " value="{{( !is_null($address)) ? $address->street_number : ' ' }}"   required>
                           </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="unit_number">Unit Number</label>
                              <input type="text" class="form-control" id="unit_number"  name="unit_number" placeholder="Unit Number" value=" {{( !is_null($address)) ? $address->unit_number : ' ' }} " required>
                         </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="suburb">Suburb</label>
                              <input type="text" class="form-control" id="suburb"  name="suburb" placeholder="Suburb" value="{{( !is_null($address)) ? $address->suburb : ' ' }}"  required>
                         </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" id="city"  name="city" placeholder="City" value="{{( !is_null($address)) ? $address->city : ' ' }}"  required>
                         </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="state">State</label>
                              <input type="text" class="form-control" id="state"  name="state" placeholder="State " value="{{( !is_null($address)) ? $address->state : ' ' }}" required>
                         </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="last_name">Post Code</label>
                              <input type="text" class="form-control" id="post_code"  name="post_code" placeholder="Post Code" value=" {{( !is_null($address)) ? $address->post_code: ' ' }}  " required>
                         </div>
                       </div>
                       <div class="col-12">
                          <div class="form-group">
                              <label for="last_name">Country</label>
                              <select class="js-example-basic-single col-12" name="country" id="country">
                                  @foreach ($countries as $country)

                                          <option {{( !is_null($address) && strtoupper($country->name) == strtoupper($address->country)) ? 'selected':' '}} value="{{$country->name}}">{{$country->name}}</option>

                                  @endforeach
                              </select>
                         </div>
                       </div>
                   </div>

                   <div class="row ">
                      <div class="col-12 d-flex justify-content-center ">
                          <button type="submit" class="btn btn-primary pl-5 pr-5">Update</button>
                      </div>
                  </div>
              </form>
            </div>
        </div>

     </div>
</div>
