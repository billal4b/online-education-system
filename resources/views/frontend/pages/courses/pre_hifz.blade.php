@extends('frontend.app')

@section('title')
    {!! $preHifz->course_name !!}
@endsection

@section('pages')
   <!--*Features-one*-->
<section class="features-one"><br/>
    
    <div class="container">
        <div class="row">                
            <div class="col-xs-12">                
                    {!! $preHifz->course_details !!}               
            </div>
        </div>
        <div class="row">  
            <div class="col-xs-12">
                {!! $preHifz->course_details_bd !!}
            </div>
        </div>             
    </div><br/>

     @include('frontend.pages.courses.salah_and_prayer')      
</section>
@include('frontend.pages.courses') 
@endsection