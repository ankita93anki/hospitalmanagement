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
              </div>
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
                 <table align="center" style="padding:100px">
                       <tr style="backkground-color:black">
                             <th style="padding:10px">Customer name</th>
                             <th style="padding:10px">Email</th>
                             <th style="padding:10px">Phone</th>
                             <th style="padding:10px">Doctor Name</th>
                             <th style="padding:10px">Date</th>
                             <th style="padding:10px">Message</th>
                             <th style="padding:10px">Status</th>
                             <th style="padding:10px">Approve</th>
                             <th style="padding:10px">Cancel</th>

                       </tr>

                    @foreach($data as $appoints)
                       <tr align="center" style="background-color: skyblue">
                            <td>{{$appoints->name}}</td>
                            <td>{{$appoints->email}}</td>
                            <td>{{$appoints->phone}}</td>
                            <td>{{$appoints->doctor}}</td>
                            <td>{{$appoints->date}}</td>
                            <td>{{$appoints->message}}</td>
                            <td>{{$appoints->status}}</td>
                            <td><a class="btn btn-success" href="{{url('approved', $appoints->id)}}">
                                Approved</a>
                            </td>
                            <td><a class="btn btn-danger" href="{{url('cancel', $appoints->id)}}">
                                Cancel</a>
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
