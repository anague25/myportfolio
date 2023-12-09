<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Add A New Sumary</h5>
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
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" name="name"  wire:model="name" id="name" cols="30" rows="1" class="form-control @error('name') is-invalid @enderror" >
                                                   
                              @error('name')
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
                           <label for="address" class="form-label">Address</label>
                           <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" wire:model="address">
                           @error('address')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="phone" class="form-label">Phone</label>
                           <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" wire:model="phone">
                           @error('phone')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>

                         <div class="mb-3">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" wire:model="email">
                           @error('email')
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
 