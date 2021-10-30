<div class="form-group row">
    <label for="street_number" class="col-sm-2 col-form-label">Street Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="street_number" name="street_number">
    </div>
  </div>
<div class="form-group row">
    <label for="unit_number" class="col-sm-2 col-form-label">Unit Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="unit_number" name="unit_number">
    </div>
  </div><div class="form-group row">
    <label for="suburb" class="col-sm-2 col-form-label">Suburb</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="suburb" name="suburb">
    </div>
  </div>
  <div class="form-group row">
    <label for="city" class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city">
    </div>
  </div>
  <div class="form-group row">
    <label for="state" class="col-sm-2 col-form-label">State</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="state" name="state">
    </div>
  </div>
  <div class="form-group row">
    <label for="post_code" class="col-sm-2 col-form-label">Post Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="post_code" name="post_code">
    </div>
  </div>
  <div class="form-group row">
    <label for="country" class="col-sm-2 col-form-label">Country</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="country" name="country" required>
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Address Type</label>
    <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="addresses" id="billing_Address" value="billing">
            <label class="form-check-label" for="billing_Address">Billing Address</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="addresses" id="shipping_Address" value="shipping">
            <label class="form-check-label" for="shipping_Address">Shipping Address</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="addresses" id="both_address" value="both" checked >
            <label class="form-check-label" for="both_address">Both</label>
          </div>
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <button class="btn btn-primary" type="submit">Update Address</button>
    </div>
  </div>
