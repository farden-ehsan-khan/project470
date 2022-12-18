<!DOCTYPE html>
<html>
   <head>
   <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .font_size
        {
            font-size: 40px;
            padding-bottom: 20px;
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
          /* border: 3px solid white; */
        }



        label
        {
            display: inline-block;
            width: 200px;
        }

        .img_size
        {
            width: 150px;
            height: 200px;
            margin: auto;
        }

        .th_color
        {
            background: #ef2346;
        }

        .th_design
        {
            padding: 20px;
            font-size: 20px;
        }
        

        table, th, td, tr
        {
            border: 1px solid grey;
        }
    </style>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/bookflix.png" type="">
      <title>Bookflix</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

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
                    <th class="th_design">Title</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Duration</th>
                    <th class="th_design" style="padding: 30px">Image</th>
                    <th class="th_design">Delivery Status</th>

                </tr>

                @foreach($order as $o)
                    <tr>
                        <td>{{$o->product_title}}</td>
                    
                        <td>{{$o->quantity}}</td>
                        <td>{{$o->duration}} week(s)</td>
                        <td>
                            <img class="img_size" src="/product/{{$o->image}}">
                        </td>
                        <td>{{$o->delivery_status}}</td>
                        
                    </tr>
                @endforeach


            </table>
            <br>

        </div>
         
      </div>

      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>