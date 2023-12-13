<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="align-middle text-center ">About List</h5>
                <div>
                    <a class="btn btn-primary" href="{{route('about.create')}}">Add About</a>
                </div>
            </div>

            
        </div>
        @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade text-center show" role="alert">
                        <h5>{{Session::get('success')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        <div class="card-body table-responsive-lg">

            <table class="table table-sm align-middle text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Short Text</th>
                    <th scope="col">Long Text</th>
                    <th scope="col">Birthday</th>
                    <th scope="col" >Website</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Age</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Email</th>
                    <th scope="col">Freelancer</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody >
                 @forelse ($about as $item)
                 <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{Str::limit($item->title,7)}}</td>
                    <td>{{Str::limit($item->shortText,7)}}</td>
                    <td>{{Str::limit($item->longText,7)}}</td>
                    <td>{{Str::limit($item->birthday,7)}}</td>
                    <td>{{Str::limit($item->website,7)}}</td>
                    <td>{{Str::limit($item->phone,7)}}</td>
                    <td>{{Str::limit($item->city,7)}}</td>
                    <td>{{Str::limit($item->age,7)}}</td>
                    <td>{{Str::limit($item->degree,7)}}</td>
                    <td>{{Str::limit($item->email,7)}}</td>
                    <td>{{Str::limit($item->freelance,7)}}</td>
                    
                    {{-- <td>
                        <button class="btn {{$item->active == 1 ? 'btn-success':'btn-danger'}} "  wire:click='toggleStatus({{$item->id}})'>{{$item->active == 1 ? 'Active':'Inactive'}}</button>
                    </td> --}}
                   
                    {{-- show image --}}
                    <td >
                       
                            {{-- <img src="{{asset('storage/'.$heroes->img)}}" alt="profile-photo" width="150" height="150"> --}}
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{$item->imageUrl($item->image)}}" class="text-center border ms-2"  alt="profile-photo" width="60" height="60"> 
                            </div>
                    </td>
                    {{-- <td>{{Str::limit($item->img,20)}}</td> --}}
                   
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary mb-2" href="{{route('about.edit',['about'=>$item->id])}}">Edit</a>
                        <a class="btn btn-sm btn-danger mb-2" wire:click='delete({{$item->id}})'>Delete</a>
                    </td>
                  </tr>
                 @empty
                 <tr>
                    <td colspan="15">
                        <div class="d-flex justify-content-center align-items-center text-danger fs-3 text-uppercase">
                            <span>no data found</span>
                            <img src="{{asset('storage/images/empty/empty.svg')}}" width="150" alt="">
                        </div>
                    </td>
                   </tr>
                 @endforelse
                 
                </tbody>
              </table>   
              
              <p>{{$about->Links()}}</p>
          
        </div>
      </div> {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
