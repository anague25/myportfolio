<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="align-middle text-center ">Message List</h5>
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
                    <th scope="col">subject</th>
                    <th scope="col">email</th>
                    <th scope="col">message</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody >
                 @forelse ($message as $item)
                 <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->subject}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{Str::limit($item->message,20)}}</td>
                   
                   
                    {{-- <td>{{Str::limit($item->img,20)}}</td> --}}
                   
                    <td>{{$item->created_at->diffForHumans()}}</td>

                    <td>
                        {{-- <a class="btn btn-primary" href="{{route('message.see',['message'=>$item->id])}}">see more</a> --}}
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
              
              <p>{{$message->Links()}}</p>
          
        </div>
      </div> {{-- Nothing in the world is as soft and yielding as water. --}}
</div>