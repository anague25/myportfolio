<div>
    <div class="container">
        <div class="row p-3 d-flex justify-content-center">
            <div class="col-7  bg-white shadow rounded px-4 pt-4 pb-5 fw-bold" style="height:400px">
                <div class="name">
                    <p class="border border-danger rounded border-start-0 border-end-0 border-top-0 border-3"><span class="text-uppercase">Nom</span> : {{$message->name}}</p>
                </div>
                <div class="subject">
                    <p class="border border-danger rounded border-start-0 border-end-0 border-top-0 border-3"><span class="text-uppercase">subject</span> : {{$message->subject}}</p>
                </div>
                <div class="email">
                    <p class="border border-danger rounded border-start-0 border-end-0 border-top-0 border-3"> <span class="text-uppercase">email</span> : {{$message->email}}</p>
                </div>
                <p class="border border-danger rounded border-start-0 border-end-0 border-top-0 border-3"><span class="text-uppercase">message</span> : </p>
                <div class="message border p-2 border-danger rounded overflow-auto" style="height:50%">
                    {{$message->message}}
                </div>
                
            </div>
        </div>
    </div>
</div>
