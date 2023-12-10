<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Update Experience</h5>
                 </div>
 
 {{-- status message --}}
                 
 
                 @if (Session::has('error'))
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <h3>{{Session::get('error')}}</h3>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 @endif
 
                 <div class="card-body">
                    <div class="profil-form">
 
                     {{-- FORMULAIRE --}}
 
                     <form action="post" wire:submit.prevent ='update' enctype="multipart/form-data">
                         @csrf
                         @method('post')
                         <div class="mb-3">
                            <label for="job" class="form-label">Job</label>
                            <input type="text" name="job"  wire:model="job" id="job"  class="form-control @error('job') is-invalid @enderror" >
                                                   
                              @error('job')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>
 
                        
                         <div class="mb-3">
                           <label for="year" class="form-label">Work Year</label>
                           <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" wire:model="year">
                           @error('year')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="workplace" class="form-label">Work Place</label>
                           <input type="text" class="form-control @error('workplace') is-invalid @enderror" id="workplace" name="workplace" wire:model="workplace">
                           @error('workplace')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>

            
                         <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 