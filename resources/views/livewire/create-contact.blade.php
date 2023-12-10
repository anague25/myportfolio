<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Add A New Contact</h5>
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
                           <label for="location" class="form-label">Location</label>
                           <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"   wire:model="location">
                           @error('location')
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
 
                         <div class="mb-3">
                           <label for="calls" class="form-label">Call</label>
                           <input type="text" class="form-control @error('call') is-invalid @enderror" id="calls" name="calls" wire:model="calls">
                           @error('calls')
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
 