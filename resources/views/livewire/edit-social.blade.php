<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Edit Social Network</h5>
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
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
                            wire:model="name" value="{{$socials->name}}">
                           @error('name')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="links" class="form-label">Social Network Link</label>
                           <input type="text" class="form-control @error('links') is-invalid @enderror" id="links" name="links" 
                           wire:model="links" value="{{$socials->links}}">
                           @error('links')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="image" class="form-label">Icon</label>
                           <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" wire:model="image">
                           @error('image')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                           <div id="image" class="form-text">Insert the fact icon or image of the social network </div>
                         </div>

                         <div class="my-2">
                            <span class="text-success fw-bold">Current Network Social Icon</span>
                            {{-- <img src="{{asset('storage/'.$heroes->img)}}" alt="profile-photo" width="150" height="150"> --}}
                            <img src="{{$socials->imageUrl($socials->icon)}}" style="object-fit: cover" alt="profile-photo" width="150" height="150">
                         </div>

                        
                         <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 