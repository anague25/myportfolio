<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Update Education</h5>
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
 
                     <form action="post" wire:submit.prevent ='store' enctype="multipart/form-data">
                         @csrf
                         @method('post')
                         <div class="mb-3">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="text" name="degree"  wire:model="degree" id="degree" cols="30" rows="1" class="form-control @error('degree') is-invalid @enderror" >
                                                   
                              @error('degree')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>
 
                         <div class="mb-3">
                           <label for="shortText" class="form-label">Short Description</label>
                           <textarea cols="30" rows="1" class="form-control @error('shortText') is-invalid @enderror" id="shortText" name="shortText" wire:model="shortText">
                           </textarea>
                           @error('shortText')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="year" class="form-label">School Year</label>
                           <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" wire:model="year">
                           @error('year')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="shoolPlace" class="form-label">School Place</label>
                           <input type="text" class="form-control @error('shoolPlace') is-invalid @enderror" id="shoolPlace" name="shoolPlace" wire:model="shoolPlace">
                           @error('shoolPlace')
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
 