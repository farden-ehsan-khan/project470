<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color
        {
            color: black;
        }

        .center
        {
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid white;
        }

        .div_design
        {
            padding-bottom: 15px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

        .img_size
        {
            width: 500px;
            height: 150px;
        }

        .th_color
        {
            background: limegreen;
        }

        .th_design
        {
            padding: 20px;
        }
        
        .center tbody tr
        {
            border-bottom: 3px solid white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>

                @endif 

                <div class="div_center">

                    <h1 class="font_size">Show Users</h1>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_design">Name</th>
                            <th class="th_design">Email</th>
                            <th class="th_design">Phone</th>
                            <th class="th_design">Address</th>
                            
                            <th class="th_design">Delete</th>

                        </tr>

                        @foreach($user as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->phone}}</td>
                                <td>{{$u->address}}</td>
                                
                                
                                <td><a class="btn btn-danger" onclick = "return confirm('For sure?')" href="{{url('delete_user',$u->id)}}">Delete</a></td>
                            </tr>
                        @endforeach

                    </table>

                </div>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>