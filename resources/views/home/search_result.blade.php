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
            background: #faba26;
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

            <h1 class="font_size">Show Search</h1>

            <form action="{{url('search_author')}}" method="POST" class="col-9" style="width: 50%; margin: auto">
                @csrf
                <input type="text" placeholder="search here" name="search" value="{{$s}}">
        
                <input type="submit" class="btn btn-primary" name="submit" value="Search">

            </form>

            <table class="center">
                <tr class="th_color">
                    <th class="th_design">Title</th>
                    <th class="th_design">Author</th>
                    <th class="th_design">Category</th>
                    <th class="th_design" style="padding: 30px">Image</th>
                    <th class="th_design">View</th>

                </tr>

                @foreach($cart as $c)
                <tr>
                    <td>{{$c->title}}</td>
                    <td>{{$c->author}}</td>
                    <td>{{$c->category}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$c->image}}">
                    </td>
                    <td>
                    <a href="{{url('product_details',$c->id)}}" class="btn" style="text-align: center; background: #ef2346; color: white">
                           {{$c->title}}
                    </td>
                </tr>
                @endforeach
           


            </table>

        </div>
         
      </div>

      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">?? 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
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