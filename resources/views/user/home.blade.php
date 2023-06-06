<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css')

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('user.header')
  @if(session()->has('message'))
  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">X</button>
       {{session()->get('message')}}
  </div>
  @endif




   <!-- .bg-light -->
   @include('user.healthyliving')

   <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($doctors as $doctor)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="doctorimage/{{$doctor->image}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$doctor->name}}</p>
              <span class="text-sm text-grey">{{$doctor->specialty}}</span>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>


   <!-- .page-section -->

  @include('user.appointment')
  <!-- .page-section -->



@include('user.footer')
@include('user.script')

</body>
</html>
