<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="align-middle text-center ">Profile List</h5>
                <div>
                    <a class="btn btn-primary" href="{{route('portfolio.create')}}">Add Profile</a>
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

            <table class="table align-middle text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Job</th>
                    <th scope="col">Staus</th>
                    <th scope="col" >Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody >
                 @forelse ($heroes as $item)
                 <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->firstName}}</td>
                    <td>{{$item->lastName}}</td>
                    <td>{{$item->job}}</td>
                    <td>
                        <button class="btn {{$item->active == 1 ? 'btn-success':'btn-danger'}} "  wire:click='toggleStatus({{$item->id}})'>{{$item->active == 1 ? 'Active':'Inactive'}}</button>
                    </td>
                   
                    {{-- show image --}}
                    <td >
                            {{-- <img src="{{asset('storage/'.$heroes->img)}}" alt="profile-photo" width="150" height="150"> --}}
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{$item->imageUrl($item->img)}}"  width="50"  alt="profile-photo"  > 

                            </div>
                    </td>
                    {{-- <td>{{Str::limit($item->img,20)}}</td> --}}
                   
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-primary mb-2" href="{{route('portfolio.edit',['heroes'=>$item->id])}}">Edit</a>
                        <a class="btn btn-danger mb-2" wire:click='delete({{$item->id}})'>Delete</a>
                    </td>
                  </tr>
                 @empty
                   <tr>
                    <td colspan="8">
                        <div class="d-flex justify-content-center align-items-center text-danger fs-3 text-uppercase">
                            <span>no data found</span>
                            <img src="{{asset('storage/images/empty/empty.svg')}}" width="150" alt="">
                        </div>
                    </td>
                   </tr>
                 @endforelse
                 
                </tbody>
              </table>   
              
              <p>{{$heroes->Links()}}</p>
          
        </div>
      </div> {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
