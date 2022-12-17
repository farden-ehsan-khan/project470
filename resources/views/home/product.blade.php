<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">

               @foreach($product as $p)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$p->id)}}" class="option1">
                           {{$p->title}}
                           </a>
                           
                           <form action="{{url('add_cart',$p->id)}}" method="POST">
                              @csrf

                              <input type="submit" value="Add to Cart">
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$p->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$p->title}}
                        </h5>
                        <h6>
                           {{$p->duration}} week(s)
                        </h6>
                     </div>
                  </div>
               </div>

               @endforeach

               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               
            </div>

         </div>
      </section>