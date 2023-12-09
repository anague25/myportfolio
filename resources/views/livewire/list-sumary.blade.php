<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="align-middle text-center ">Sumary List</h5>
                <div>
                    <a class="btn btn-primary" href="{{route('sumary.create')}}">Add Sumary</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Short Text</th>
                    <th scope="col">address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody >
                 @forelse ($sumary as $item)
                 <tr>
                    <th scope="row">{{$loop->iteration}}</th>

                    <td>{{$item->name}}</td>

                    <td>{{Str::limit($item->shortText,10)}}</td>

                    <td>{{$item->address}}</td>

                    <td>{{$item->phone}}</td>

                    <td>{{$item->email}}</td>
                    {{-- <td>
                        <button class="btn {{$item->active == 1 ? 'btn-success':'btn-danger'}} "  wire:click='toggleStatus({{$item->id}})'>{{$item->active == 1 ? 'Active':'Inactive'}}</button>
                    </td> --}}
                   
                    {{-- <td>{{Str::limit($item->img,20)}}</td> --}}
                   
                    <td>{{$item->created_at->diffForHumans()}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{route('sumary.edit',['sumary'=>$item->id])}}">Edit</a>
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
              
              <p>{{$skills->Links()}}</p>
          
        </div>
      </div> {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
