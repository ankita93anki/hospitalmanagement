<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
            </div>
          </div>
        </div>
      </div>

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      @include('admin.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        @endif
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="container" align="center" style="padding-top: 100px;">

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
             {{session()->get('message')}}
        </div>
            <h1 style="color:#fff;display:inline">Add Doctor</h1>

            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div style="padding: 15px">
                    <label>Doctor Name : </label>
                    <input type="text" style="color:black;" name="name"
                    id="" placeholder="Write the name" required="">
                </div>
                <div style="padding: 15px">
                    <label>Phone Number : </label>
                    <input type="number" style="color:black;" name="number"
                    id="" placeholder="Write the number" required="">
                </div>
                <div style="padding: 15px">
                    <label>Speciality : </label>
                    <select name="speciality" id=""
                    style="color:black;width:200px" required="">
                        <option value="Skin">Skin</option>
                        <option value="Heart">Heart</option>
                        <option value="Eye">Eye</option>
                        <option value="Nose">Nose</option>
                        <option value="Brain">Brain</option>
                    </select>
                </div>
                <div style="padding: 15px">
                    <label>Room Number : </label>
                    <input type="text" style="color:black;" name="room"
                    id="" placeholder="Write the room number" required="">
                </div>
                <div style="padding: 15px">
                    <label>Doctor Image : </label>
                    <input type="file" name="file" required="">
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
