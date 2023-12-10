<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Add A New service</h5>
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
                           <label for="title" class="form-label">Title</label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"   wire:model="title">
                           @error('title')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="shortText" class="form-label">Short Text</label>
                           <textarea name="shortText"  wire:model="shortText" id="shortText" cols="30" rows="1" class="form-control @error('shortText') is-invalid @enderror" >
                        </textarea>                           
                             @error('shortText')
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
                        
                         <button type="submit" class="btn btn-primary">Submit</button>
                       </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 