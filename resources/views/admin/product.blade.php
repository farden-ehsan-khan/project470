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
                    
                    <h1 class='font_size'>Add Product</h1>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="div_design">
                            <label>Title: </label>
                            <input class="input_color" type="text" name="title" placeholder="Write Title" required="">
                        </div>

                        <div class="div_design">
                            <label>Author: </label>
                            <input class="input_color" type="text" name="author" placeholder="Write Author" required="">
                        </div>

                        <div class="div_design">
                            <label>Description: </label>
                            <input class="input_color" type="text" name="description" placeholder="Write Description">
                        </div>

                        <div class="div_design">
                            <label>Quantity: </label>
                            <input class="input_color" type="text" name="quantity" min="0" placeholder="Write Quantity" required="">
                        </div>

                        <div class="div_design">
                            <label>Category: </label>
                                <select class="input_color" name="category" required="">
                                    <option value="" selected="">-Add a category here--</option>
                                    @foreach($category as $category)
                                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="div_design">
                            <label>Duration: </label>
                            <input class="input_color" type="number" name="duration" placeholder="Write duration weeks" required="">
                        </div>

                        <div class="div_design">
                            <label>Image: </label>
                            <input type="file" name="image" required="">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Add product" class="btn btn-primary">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>