<div class="card mt-2" >
    <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#settings" aria-expanded="true" aria-controls="settings">
          <div class="card-title">Settings</div>
        </button>
      </h5>
    </div>
    <div id='settings' class="collapse">
        <div class="card-body">
            <form action="{{route('update-settings')}}" method="POST">
                @csrf
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                            <label for="first_name">First Name</label>
                       <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="First Name " value=" {{( !is_null($user)) ? $user->firstname : ' ' }} " required>
                       </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="Last Name " value=" {{( !is_null($user)) ? $user->lastname : ' ' }} " required>
                     </div>
                   </div>
               </div>
               <div class="form-group">
                  <label for="biographie">Biographie</label>
                  <textarea class="form-control" id="biographie" rows="3" name="bio_graphie" value=" {{( !is_null($user) && !is_null($user->biography) ) ? $user->biography : ' ' }} " placeholder=" {{( !is_null($user) && !is_null($user->biography) ) ? $user->biography : ' ' }} " ></textarea>
                </div>
               <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                           <label for="Email">Email</label>
                           <input type="text" class="form-control" id="email"   placeholder="Email " value=" {{( !is_null($user)) ? $user->email : ' ' }} " disabled>
                      </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                         <label for="date_join">Date join</label>
                         <input type="text" class="form-control" id="date_join"  placeholder="Date Join " value=" {{( !is_null($user)) ? $user->created_at->format(" d m Y") : ' ' }} " disabled>
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
