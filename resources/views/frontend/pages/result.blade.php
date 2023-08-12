@extends('frontend.app')
@section('css')
<style>
    .color:hover {       
        background-color: yellow;
        padding: 10px;
    }
    .noticelink {
        background-color: yellowgreen;
        padding: 10px;
    }
    .post-content {
        height: 250px;
    }
</style>
@endsection 
@section('title') Results @endsection
@section('pages')

<section id="blog_main_sec" class="grid-view section-inner">
    <div class="container">
        <div class="inner-heading">
            <h3> Exam Results</h3>
        </div>
        <div class="row">
            <!--*Blog Content Sec*-->
            <div class="col-md-12">
                <div class="row blog_post_sec">   

                    @foreach ($data as $result)  

                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item">
                        <div class="blog-post_wrapper">
                            <div class="blog-post-inner_wrapper">
                                <div class="post-detail_container">
                                    <div class="post-content">
                                        
                                        <h3>{{ $result->course_title }}</h3>
                                        <strong> {{ $result->exam_name }}</strong>
                                        <p>{{ $result->subject_name }}</p>      
                                         <strong class="noticelink">                    
                                            <a href="/public/result/{!! $result->pdf_file !!}" target="_blank"> Please Click Here & see your result </a>
                                        </strong>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach                  

            </div>
            <!--* End Blog Content Sec*-->           
        </div>
        {!! $data->links() !!}
    </div>
</section>



@endsection

@section('scripts')   
<script>
</script>
@endsection