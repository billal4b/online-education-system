@extends('frontend.app')
@section('css')
<style>
    ul li {
        padding-left: 5px;
    }
    #search {
        border-color: burlywood;
    }
    .table tbody tr:hover{
        background-color: #01013a; !important;
        color:white;
    }
    #cover-spin {
        position: absolute;
        width: 100%;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: 9999;
        display: none;
    }

    @-webkit-keyframes spin {
        from {
            -webkit-transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes  spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    #cover-spin::after {
        content: '';
        display: block;
        position: absolute;
        left: 48%;
        top: 40%;
        width: 40px;
        height: 40px;
        border-style: solid;
        border-color: black;
        border-top-color: transparent;
        border-width: 4px;
        border-radius: 50%;
        -webkit-animation: spin .8s linear infinite;
        animation: spin .8s linear infinite;
    }
    /*input[type="search"] {*/
    /*    -webkit-box-sizing: content-box;*/
    /*    -moz-box-sizing: content-box;*/
    /*    box-sizing: content-box;*/
    /*    -webkit-appearance: searchfield;*/
    /*}*/

    input[type="search"]::-webkit-search-cancel-button {
        -webkit-appearance: searchfield-cancel-button;
    }
    
    /*.height-fixid {max-height: 300px}*/
    
    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
      .height-fixid {max-height: 400px}
    }
    

</style>
@endsection
@section('title')Quranic Dictionary @endsection
@section('pages')
<section id="mt_contact" class="contact-main section-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
{{--                <input type="text" id="subject" autocomplete="off" style="height: 35px" name="subject" class="form-control" placeholder="Type Subject"/>--}}
                <select name="subject" id="subject" style="height: 35px" class="form-control"></select>
            </div>
            <div class="col-md-8">
                <input type="search" id="search" style="height: 35px" name="search" class="form-control" placeholder="Word Search Here..."/>
            </div>
            <div class="col-md-12">
                <div id="cover-spin"></div>
                <div class="table-responsive height-fixid">
                    <table class="table table-condensed table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Bengali Word</th>
                            <th scope="col">Arabic Word</th>
                            <th scope="col">English Word</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class="text-center">Total Used</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $wordbook)
                            <tr>
                                <td>{!! $wordbook->bengali_word !!}</td>
                                <td>{!! $wordbook->arabic_word !!}</td>
                                <td>{!! $wordbook->english_word !!}</td>
                                <td>{!! $wordbook->lesson_no !!}</td>
                                <td class="text-center">{!! $wordbook->total_mentioned !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="subject_data"></div>
    </div>
</section>

@endsection

@section('scripts')
        <link href="{{asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('public/select2/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('public/select2/select2.js')}}"></script>
<script>
$(document).ready(function(){

    $('#subject').select2({
        theme: "bootstrap",
        tags:true,
        allowClear:true,
        placeholder:'Type Subject(English)',
        minimumInputLength: 0,
        ajax: {
            url: '{{route('dictionary.quarnic.subject.search')}}',
            dataType: 'json'
        }
    }).on('change', function (e) {
        let sub = $("#subject").find(":selected").text();
        let search = $('#search').val();
        fetch_dictionary_data(sub,search);
        //alert($("#subject").find(":selected").text())
        //console.log($(this).val())
    })
    .on('selecting', function (e) {
            console.log('$(this).val()')
    })

    function fetch_dictionary_data(subject,search){
        $.ajax({
            url:"{{ route('dictionary.arabic') }}",
            method:'GET',
            data:{subject:subject,search:search,searchBy:'yes'},
            dataType:'json',
            beforeSend: function () {
                $('#cover-spin').show(0)
            },
            success:function(data){
                $('tbody').html(data);
            },
            complete: function () {
                $('#cover-spin').hide(0)
            },
            error: function () {
                $('#cover-spin').hide(0)
            }
        })
    }

    // $(document).on('keyup', '#subject,#search', function(){
    function sea(){
        $(document).on('keyup', '#search', function(){
            let subject = $('#subject').val();
            let search = $('#search').val();
            fetch_dictionary_data(subject,search);
        });
    }
    sea()

});
</script>
@endsection