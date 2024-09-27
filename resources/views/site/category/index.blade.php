<!-- product section -->
<section class="product_section ">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>Categories</span>
            </h2>
        </div>
        <div class="row" id="products">
            @foreach($categories as $category)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('categories.show' , $category->id)}}" class="option1">
                                    Products
                                </a>

                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{$category->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$category->name}}
                            </h5>
                        </div>


                    </div>
                </div>
            @endforeach

        </div>
    </div>

</section>




