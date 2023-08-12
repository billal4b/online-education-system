@extends('frontend.app')
@section('css')
<style>
    .dashboard {
        padding-left: 0px;
    }
    .list-group-item {
        min-height: 50px;
    }
    .list-group-item-heading, .list-group-item-text {
       text-align: center;
    }
</style>
@endsection
@section('title') Online Exam @endsection
@section('pages')
<section id="mt_contact" class="contact-main section-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard">
                <a href="#" class="list-group-item active">
                    <h3 class="list-group-item-heading">Question Not Ready!!</h3>
                    <p class="list-group-item-text">Please contact your Instructor.</p>
                    </a>
            </div>
        </div>
    </div>
</section>

@endsection


