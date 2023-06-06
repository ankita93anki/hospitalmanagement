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

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Our Doctors</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div>


   <!-- .bg-light -->

  @include('user.doctor')

   <!-- .page-section -->

  @include('user.appointment')
  <!-- .page-section -->



@include('user.footer')
@include('user.script')

</body>
</html>
