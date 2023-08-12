@extends('frontend.app')


@if(!is_null($hifjulQuranMale))

    @section('title')
        {!! $hifjulQuranMale->course_name !!}
    @endsection
@endif  

    @section('pages')
       <!--*Features-one*-->
    <section class="features-one"><br/>
    @if(!is_null($hifjulQuranMale))
        <div class="container">
            <div class="row">                
                <div class="col-xs-12">                
                        {!! $hifjulQuranMale->course_details !!}               
                </div>
            </div>
            <div class="row">  
                <div class="col-xs-12">
                    {!! $hifjulQuranMale->course_details_bd !!}
                </div>
            </div>             
        </div><br/>
    @endif  
        @include('frontend.pages.courses.salah_and_prayer')      
    </section>
    
    
    @include('frontend.pages.courses') 
    @endsection


