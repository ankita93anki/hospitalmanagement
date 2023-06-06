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
            </div>
          </div>
        </div>
      </div>

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      @include('admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div>
                <div style="margin-top: 40px">

                </div>
                <h1 style="text-align: center; margin-bottom:30px">Show Appointment</h1>
                 <table align="center" style="padding-top:100px">
                       <tr style="backkground-color:black">
                             <th style="padding:10px">Customer name</th>
                             <th style="padding:10px">Email</th>
                             <th style="padding:10px">Phone</th>
                             <th style="padding:10px">Doctor Name</th>
                             <th style="padding:10px">Date</th>
                             <th style="padding:10px">Edit</th>
                             <th style="padding:10px">Delete</th>

                       </tr>

                    @foreach($data as $doctors)
                       <tr align="center" style="background-color: skyblue">
                            <td>{{$doctors->name}}</td>
                            <td>{{$doctors->phone}}</td>
                            <td>{{$doctors->speciality}}</td>
                            <td>{{$doctors->room}}</td>
                            <td><img src="doctorimage/{{$doctors->image}}"
                                style="height:100px;width:100px"/></td>
                            <td><a  class="btn btn-success"
                                href="{{url('updatedoctor',$doctors->id)}}">
                                Edit</a>
                            </td>
                            <td><a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger"
                                href="{{url('deletedoctor', $doctors->id)}}">
                                Delete</a>
                            </td>
                       </tr>
                    @endforeach
                 </table>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
      @include('admin.script')
    </div>
    </body>
</html>
