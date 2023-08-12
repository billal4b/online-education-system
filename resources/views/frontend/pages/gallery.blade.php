@extends('frontend.app')

@section('title')
    Gallery
@endsection

@section('pages')

    <!-- Gallery -->
    <section id="the-gallery" class="wide-gallery inner-gallery section-inner">
        <div class="container">
            <!-- section title -->
            <div class="inner-heading">
                <h3>Gallery</h3>
            </div>

            <div class="row ge_second">
                @foreach ($galleryImage as $image)
                    <div class="col-sm-4 mix" >
                        <div class="item port-popup">
                            <a href="public/images/banner/{!! $image->image_name !!}" title="">
                                <img src="public/images/banner/{!! $image->image_name !!}" alt="">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>                    
                    </div>                    
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Gallery -->
@endsection