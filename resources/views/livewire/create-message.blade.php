<section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>I am always available to answer your requests, whether by phone or email,
          i am available 24/24, 7/7 to meet your urgent needs, so do not hesitate to contact me.</p>
      </div>

     

      <div class="row" >
        @if (!empty($infoContact))
        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>{{$infoContact->location}}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{$infoContact->email}}</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>{{$infoContact->call}}</p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        @else
        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>No Data</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>No Data</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>No Data</p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        @endif

       
        

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

           

          <form  method="post" wire:submit.prevent="store" class="shadow p-3">
            @csrf
            @method('post')
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" wire:model="name" required class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" wire:model="email" required class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror 
              </div>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" wire:model="subject" id="subject" required class="form-control @error('subject') is-invalid @enderror">
              @error('subject')
              <div class="text-danger">{{$message}}</div>
              @enderror 
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" wire:model="message" rows="10" required class="form-control @error('message') is-invalid @enderror"></textarea>
              @error('message')
              <div class="text-danger">{{$message}}</div>
              @enderror 
            </div>
            
            <div class="text-center p-2 m-2"><button type="submit">Send Message</button></div>
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade text-center show" role="alert">
                <h5>{{Session::get('success')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          </form>
        </div>

      </div>

    </div>
  </section>