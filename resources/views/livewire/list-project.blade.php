<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="align-middle text-center ">Project List</h5>
                <div>
                    <a class="btn btn-primary" href="{{route('project.create')}}">Add Profile</a>
                </div>
            </div>

            
        </div>
        @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade text-center show" role="alert">
                        <h5>{{Session::get('success')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        <div class="card-body">

            <table class="table align-middle text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Client</th>
                    <th scope="col">Project Date</th>
                    <th scope="col">Project Url</th>
                    <th scope="col">title</th>
                    <th scope="col">Short Description</th>
                    <th scope="col" >Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody >
                 @forelse ($project as $item)
                 <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->projectName}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->client}}</td>
                    <td>{{$item->projectDate}}</td>
                    <td>{{$item->projectUrl}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->shortText}}</td>
                    {{-- <td>
                        <button class="btn {{$item->active == 1 ? 'btn-success':'btn-danger'}} "  wire:click='toggleStatus({{$item->id}})'>{{$item->active == 1 ? 'Active':'Inactive'}}</button>
                    </td> --}}
                   
                    {{-- show image --}}
                    <td class="d-flex justify-content-center">
                            {{-- <img src="{{asset('storage/'.$heroes->img)}}" alt="profile-photo" width="150" height="150"> --}}
                            <img src="{{$item->imageUrl($item->image)}}" class="text-center border ms-2"  alt="profile-photo" width="60" height="60"> 
                    </td>
                    {{-- <td>{{Str::limit($item->img,20)}}</td> --}}
                   
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('project.edit',['project'=>$item->id])}}">Edit</a>
                        <a class="btn btn-danger" wire:click='delete({{$item->id}})'>Delete</a>
                    </td>
                  </tr>
                 @empty
                     <div class="text-center text-uppercase alert alert-danger">
                        <h2>we don't found any data</h2>
                     </div>
                 @endforelse
                 
                </tbody>
              </table>   
              
              <p>{{$project->Links()}}</p>
          
        </div>
      </div> {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
