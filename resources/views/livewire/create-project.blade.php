<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Add Project</h5>
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
                           <label for="projectName" class="form-label">Project Name</label>
                           <input type="text" class="form-control @error('projectName') is-invalid @enderror" id="projectName" name="projectName"   wire:model="projectName">
                           @error('projectName')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="category 	" class="form-label">Category</label>
                           <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" wire:model="category">
                           @error('category')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="client" class="form-label">Client</label>
                           <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" wire:model="client">
                           @error('client')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="projectDate" class="form-label">Project Date</label>
                           <input type="date" class="form-control @error('projectDate') is-invalid @enderror" id="projectDate" name="projectDate" wire:model="projectDate">
                           @error('projectDate')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="projectUrl" class="form-label">Project Url</label>
                           <input type="text" class="form-control @error('projectUrl') is-invalid @enderror" id="projectUrl" name="projectUrl" wire:model="projectUrl">
                           @error('projectUrl')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="title" class="form-label">title</label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" wire:model="title">
                           @error('title')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="shortText" class="form-label">Short Description</label>
                           <input type="text" class="form-control @error('shortText') is-invalid @enderror" id="shortText" name="shortText" wire:model="shortText">
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
 