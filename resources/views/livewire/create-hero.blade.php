<div>
   <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <h5>Add A New Profil</h5>
                </div>

{{-- status message --}}
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h3>{{Session::get('success')}}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h3>{{Session::get('error')}}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                   <div class="profil-form">
                    <form action="post" wire:submit.prevent ='store'>
                        @csrf
                        @method('post')
                        <div class="mb-3">
                          <label for="firstName" class="form-label">First Name</label>
                          <input type="text" class="form-control @error('firstName') is-invalid @enderror>" id="firstName" name="firstName" wire:model="firstName">
                          @error('firstName')
                              <div class="text-danger">{{$message}}</div>
                          @enderror 
                        </div>

                        <div class="mb-3">
                          <label for="lastName" class="form-label">Last Name</label>
                          <input type="text" class="form-control @error('lastName') is-invalid @enderror>" id="lastName" name="lastName" wire:model="lastName">
                          @error('firstName')
                              <div class="text-danger">{{$message}}</div>
                          @enderror 
                        </div>

                        <div class="mb-3">
                          <label for="job" class="form-label">Job</label>
                          <input type="text" class="form-control @error('job') is-invalid @enderror>" id="job" name="job" wire:model="job">
                          @error('job')
                              <div class="text-danger">{{$message}}</div>
                          @enderror 
                          <div id="emailHelp" class="form-text">if you have many jobs, so please seperated each job by comar eg :"developper,photograph" </div>
                        </div>

                        <div class="mb-3">
                          <label for="image" class="form-label">Profile Image</label>
                          <input type="file" class="form-control @error('image') is-invalid @enderror>" id="image" name="image" wire:model="image">
                          @error('image')
                              <div class="text-danger">{{$message}}</div>
                          @enderror 
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                   </div>
                </div>
            </div>
        </div>
   </div>
</div>
