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
        <div class="card-body">

            <table class="table text-center align-middle">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Job</th>
                    <th scope="col">image</th>
                    <th scope="col">Staus</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>
                 @forelse ($heroes as $item)
                 <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->firstName}}</td>
                    <td>{{$item->lastName}}</td>
                    <td>{{$item->job}}</td>
                    <td>{{Str::limit($item->img,20)}}</td>
                    <td>{{$item->active}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                  </tr>
                 @empty
                     
                 @endforelse
                 
                </tbody>
              </table>         
          
        </div>
      </div> {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
