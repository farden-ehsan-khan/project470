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

                    <h1 class="font_size">Show Orders</h1>

                    <table class="center">
                        <tr class="th_color">
                        <th class="th_design">Name</th>
                        <th class="th_design">Email</th>
                        <th class="th_design">Phone</th>
                        <th class="th_design">Address</th>
                        <th class="th_design">Title</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Duration</th>
                        <th class="th_design" style="padding: 30px">Image</th>
                        <th class="th_design">Payment Status</th>
                        <th class="th_design">Delivery Status</th>
                        <th class="th_design">Remove</th>

                        </tr>

                        @foreach($order as $o)
                            <tr>
                                <td>{{$o->name}}</td>
                                <td>{{$o->email}}</td>
                                <td>{{$o->phone}}</td>
                                <td>{{$o->address}}</td>
                                <td>{{$o->product_title}}</td>
                            
                                <td>{{$o->quantity}}</td>
                                <td>{{$o->duration}} week(s)</td>
                                <td>
                                    <img class="img_size" src="/product/{{$o->image}}">
                                </td>
                                @if($o->payment_status=="PAID")
                                    <td style="background: limegreen">{{$o->payment_status}}</td>
                                    <td>
                                        <a href="{{url('start_delivery',$o->id)}}" class="btn" style="background: limegreen">{{$o->delivery_status}}</a>
                                    </td>
                                @else
                                    <td style="background: crimson">{{$o->payment_status}}</td>
                                    <td>
                                        <a href="{{url('start_delivery',$o->id)}}" class="btn" style="background: crimson">{{$o->delivery_status}}</a>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{url('remove_delivery',$o->id)}}" style="color: crimson" onclick="return confirm('Do you want to remove?')">Remove</a>
                                </td>
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