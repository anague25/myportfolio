<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Edit About</h5>
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
                           <label for="title" class="form-label">Title</label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                            wire:model="title" value="{{$about->title}}">
                           @error('title')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="shortText" class="form-label">Short Text</label>
                           <textarea name="shortText"  wire:model="shortText" id="shortText" cols="30" rows="1" class="form-control @error('shortText') is-invalid @enderror" value="{{$about->shortText}}">
                            </textarea>
                          
                            @error('shortText')
                                <div class="text-danger">{{$message}}</div>
                            @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="longText" class="form-label">Long Text</label>
                           <textarea name="longText" wire:model="longText" id="longText" cols="30" rows="2" class="form-control @error('longText') is-invalid @enderror" value="{{$about->longText}}">
                        </textarea>
                           @error('longText')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                           {{-- <div id="job" class="form-text">if you have many jobs, so please seperated each job by comar eg :"developper,photograph" </div> --}}
                         </div>


                         <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" 
                            wire:model="birthday" value="{{$about->birthday}}">
                             @error('birthday')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

                         <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" 
                            wire:model="website" value="{{$about->website}}">
                             @error('website')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

                          <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" 
                            wire:model="phone" value="{{$about->phone}}">
                             @error('phone')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

                          <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" 
                            wire:model="city" value="{{$about->city}}">
                             @error('city')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

                          <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" 
                            wire:model="age" value="{{$about->age}}">
                             @error('age')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>


                          <div class="mb-3">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="text" class="form-control @error('degree') is-invalid @enderror" id="degree" name="degree" 
                            wire:model="degree" value="{{$about->degree}}">
                             @error('degree')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                            wire:model="email" value="{{$about->email}}">
                             @error('email')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

                          <div class="mb-3">
                            <label for="freelance" class="form-label">Freelance</label>
                            <input type="text" class="form-control @error('freelance') is-invalid @enderror" id="freelance" name="freelance" 
                            wire:model="freelance" value="{{$about->freelance}}">
                             @error('freelance')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>

 
                         <div class="mb-3">
                           <label for="image" class="form-label">Image</label>
                           <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" wire:model="image">
                           @error('image')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>

                         <div class="my-2">
                            <span class="text-success fw-bold">Current Picture</span>
                            {{-- <img src="{{asset('storage/'.$heroes->img)}}" alt="profile-photo" width="150" height="150"> --}}
                            <img src="{{$about->imageUrl($about->image)}}" style="object-fit: cover" alt="profile-photo" width="150" height="150">
                         </div>
                        
                         <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 