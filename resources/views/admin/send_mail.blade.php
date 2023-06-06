<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- partial:partials/_sidebar.html -->
      @include('admin.navbar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
{{--
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                 {{session()->get('message')}}
            </div>
            @endif --}}
            <!-- partial:partials/_navbar.html -->
            <!-- partial -->
            <h1 align="center">Mail From Doctor</h1>
            <div class="container" align="center" style="padding-top: 100px;">
                <form action="{{url('sendemail',$data->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div style="padding: 15px">
                        <label>Greeting : </label>
                        <input type="text" style="color:black;" name="greeting"
                         placeholder="Greeting" required="">
                    </div>
                    <div style="padding: 15px">
                        <label>Body : </label>
                        <input type="text" style="color:black;" name="body"
                         placeholder="Body" required="">
                    </div>
                    <div style="padding: 15px">
                        <label>Action Text : </label>
                        <input type="text" style="color:black;"
                        name="actionText"
                        placeholder="Action Text" required="">
                    </div>
                    <div style="padding: 15px">
                        <label>Action Url : </label>
                        <input type="text" style="color:black;"
                        name="actionUrl"
                        placeholder="Action Url" required="">
                    </div>
                    <div style="padding: 15px">
                        <label>End Part : </label>
                        <input type="text" style="color:black;"
                        name="endPart"
                        placeholder="End Part" required="">
                    </div>
                    <div style="padding: 15px">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
                  <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
      @include('admin.script')
    </div>
    </body>
</html>
