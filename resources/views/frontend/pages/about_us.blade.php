@extends('frontend.app')

@section('title')
    About Us
@endsection

@section('pages')
    @foreach ($aboutUs as $item)     
        <!--*About*-->
        <section id="mt_about body-color">
            <div class="container">
                <div class="about_services">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="about-items">
                                <div class="inner-heading">
                                    <h3>{!! $item->title !!}</h3>
                                </div>
                                <p> {!! $item->content !!} </p>
                            </div>
                        </div>                    
                    </div>                    
                </div>
            </div>
        </section>
        <!--*EndAbout*-->
    @endforeach

@endsection