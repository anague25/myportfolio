<div>
    <div class="row">
         <div class="col">
             <div class="card">
                 <div class="card-header">
                         <h5>Add A New Mission</h5>
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
                            <label for="shortText" class="form-label">Task Job</label>
                            <textarea name="shortText"  wire:model="shortText" id="shortText" cols="30" rows="1" class="form-control @error('shortText') is-invalid @enderror" >
                            </textarea>             
                              @error('shortText')
                                 <div class="text-danger">{{$message}}</div>
                             @enderror 
                          </div>
 
                        
 
                         <div class="mb-3">
                           <label for="address" class="form-label">Job</label>
                           <select name="experience" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" wire:model="experience">
                        

                            <option value=""></option>
                            @forelse ($experience as $item)
                                <option value="{{$item->id}}">{{$item->job}}</option>
                            @empty
                            <option value=""></option>
                            @endforelse
                            

                            </select>
                          
                           @error('address')
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
 