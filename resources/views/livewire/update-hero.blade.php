<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Edit Profile</h5>
                 </div>
                 
                    {{ $socials}}   
                 
 
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
                           <label for="firstName" class="form-label">First Name</label>
                           <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" 
                           wire:model="firstName" value="{{$heroes->firstName}}">
                           @error('firstName')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="lastName" class="form-label">Last Name</label>
                           <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" 
                           wire:model="lastName" value="{{$heroes->lastName}}>
                           @error('lastName')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="job" class="form-label">Job</label>
                           <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" 
                           wire:model="job" value="{{$heroes->job}}>
                           @error('job')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                           <div id="job" class="form-text">if you have many jobs, so please seperated each job by comar eg :"developper,photograph" </div>
                         </div>
 
                         <div class="mb-3">
                           <label for="image" class="form-label">Profile Image</label>
                           <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" 
                           wire:model="image">
                           @error('image')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
                         {{-- update image --}}
                         <div class="my-2">
                            <span class="text-success fw-bold">Current Picture</span>
                            {{-- <img src="{{asset('storage/'.$heroes->img)}}" alt="profile-photo" width="150" height="150"> --}}
                            <img src="{{$heroes->imageUrl($heroes->img)}}" style="object-fit: cover" alt="profile-photo" width="150" height="150">
                         </div>
                        
                         <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 