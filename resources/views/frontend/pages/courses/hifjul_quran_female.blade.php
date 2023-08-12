@extends('frontend.app')

@if(!is_null($hifjulQuranFemale))
    @section('title')
        {!! $hifjulQuranFemale->course_name !!}
    @endsection

  @endif

@section('pages')
   <!--*Features-one*-->
<section class="features-one"><br/>
    @if(!is_null($hifjulQuranFemale))
    
    <div class="container">
        <div class="row">                
            <div class="col-xs-12">                
                    {!! $hifjulQuranFemale->course_details !!}               
            </div>
        </div>
        <div class="row">  
            <div class="col-xs-12">
                {!! $hifjulQuranFemale->course_details_bd !!}
            </div>
        </div>             
    </div><br/>
    @endif
        @include('frontend.pages.courses.salah_and_prayer')      
</section>
@include('frontend.pages.courses') 
@endsection