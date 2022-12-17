<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public"> 

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

                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="div_design">
                            <label>Title: </label>
                            <input class="input_color" type="text" name="title" placeholder="Write Title" required="" value="{{$product->title}}">
                        </div>

                        <div class="div_design">
                            <label>Author: </label>
                            <input class="input_color" type="text" name="author" placeholder="Write Author" required="" value="{{$product->author}}">
                        </div>

                        <div class="div_design">
                            <label>Description: </label>
                            <input class="input_color" type="text" name="description" placeholder="Write Description" value="{{$product->description}}">
                        </div>

                        <div class="div_design">
                            <label>Quantity: </label>
                            <input class="input_color" type="text" name="quantity" min="0" placeholder="Write Quantity" required="" value="{{$product->quantity}}">
                        </div>

                        <div class="div_design">
                            <label>Category: </label>
                                <select class="input_color" name="category" required="">
                                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                    
                                    @foreach($category as $category)
                                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                        </div>

                        <div class="div_design">
                            <label>Duration: </label>
                            <input class="input_color" type="number" name="duration" placeholder="Write duration weeks" required="" value="{{$product->duration}}">
                        </div>

                        <div class="div_design">
                            <label>Current Image: </label>
                            
                            <img style="margin:auto; height=500px; width:150px;" src="/product/{{$product->image}}">
                        </div>

                        <div class="div_design">
                            <label>Change Image: </label>
                            <input type="file" name="image">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Update product" class="btn btn-primary">
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