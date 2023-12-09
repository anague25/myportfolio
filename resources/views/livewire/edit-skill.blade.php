<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Edit Skills</h5>
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
                            <label for="shortText" class="form-label">Short Text</label>
                            <textarea name="shortText"  wire:model="shortText" id="shortText" cols="30" rows="1" class="form-control @error('shortText') is-invalid @enderror" >
                         </textarea>                           
                              @error('shortText')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>
 
                         <div class="mb-3">
                           <label for="skillName" class="form-label">Skill Name</label>
                           <input type="text" class="form-control @error('skillName') is-invalid @enderror" id="skillName" name="skillName" wire:model="skillName">
                           @error('skillName')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                         </div>
 
                         <div class="mb-3">
                           <label for="percentage" class="form-label">Percentage</label>
                           <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" name="percentage" wire:model="percentage">
                           @error('percentage')
                               <div class="text-danger">{{$message}}</div>
                           @enderror 
                           <div id="percentage" class="form-text">entry the mastery percentage of the skill </div>
                         </div>
 
                        
                         <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 