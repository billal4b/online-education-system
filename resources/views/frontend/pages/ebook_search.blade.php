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
    #blog_main_sec .post-detail_container .post-content .post-metadata li {
        font-size: 16px;
        line-height: 30px;
    }
    #blog_main_sec .post-detail_container .post-content {
        min-height: 300px;
    }
</style>
@endsection
@section('title') eBook @endsection
@section('pages')

<section id="blog_main_sec" class="section-inner">
    <div class="container">
        <div class="row">
            <form action="{{ route('ebook.search') }}" method="GET">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <select name="section" id="section" class="form-control">
                        <option value="0">-- All --</option>
                        <option value="1">ইসলামিয়াত</option>
                        <option value="2">দুয়া</option>
                        <option value="3">এরাবিক</option>
                        <option value="4">অন্যন্য</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-danger">Filter</button>
                </div>
            </form>
            <div class="col-sm-12">
                <div class="row blog_post_sec">
                    @if($ebookSearch->isNotEmpty())
                        @foreach ($ebookSearch as $ebook)
                            <div class="col-md-4 col-sm-4 col-xs-12 grid-item">
                                <div class="blog-post_wrapper">
                                    <div class="blog-post-inner_wrapper">
                                        <div class="post-detail_container">
                                            <div class="post-content">
                                                <h4 class="post-title entry-title">
                                                    <a href="{{ route('ebook.post', $ebook->slug) }}">{!! $ebook->course_title !!}</a>
                                                </h4>
                                                <ul class="list-unstyled list-inline post-metadata icon-text-size">
                                                    <li><i class="ion-ios-book-outline"></i>&nbsp;{!! $ebook->subject !!}</li><br>
                                                    <li><i class="ion-ios-book-outline"></i>&nbsp;{!! $ebook->subject_code !!}</li><br>
                                                    <li><i class="ion-ios-stopwatch-outline"></i>&nbsp; {!! date('d-m-Y', strtotime($ebook->created_at)) !!}</li>
                                                </ul>
                                                <div class="view_detail">
                                                    <a href="{{ route('ebook.post', $ebook->slug) }}" class="mt_btn_yellow">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item">
                            <h3>No data found</h3>
                        </div>
                    @endif
                </div>
                {!! $ebookSearch->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
@endsection
