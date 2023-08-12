@extends('backend.layouts.template')
@section('css') 
<style>
  
</style>    
@endsection
@section('main-content')
<div class="row">
    
    <div class="col-lg-12 col-md-12 col-xs-12">
        @include('flash-message')
        <div class="dashboard-list-box">
            <h4 class="gray">Word List <a href="{{ route('admin.wordbook.create') }}" ><span class="button gray">Add</span></a>
            </h4>
            <div class="table-box">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>      
                            <th>Bengali</th>                    
                            <th>Arabic</th>                    
                            <th>English</th> 
                            <th>Book</th>  
                            <th>Lesson</th>  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wordbooks as $wordbook)
                        <tr>
                            <td>{!! $wordbook->bengali_word !!}</td>
                            <td>{!! $wordbook->arabic_word !!}</td>
                            <td>{!! $wordbook->english_word !!}</td>
                            <td>{!! $wordbook->book_name !!}</td>
                            <td>{!! $wordbook->lesson_name !!}</td>
                            <td>                         
                                <a href="{{ route('admin.wordbook.edit', $wordbook->id) }}" class="button">Edit</a>
                                <a href="{{ route('admin.wordbook.delete', $wordbook->id) }}" class="button" onclick="return confirm('Are you sure to Delete?')"> Delete</a>
                            </td>   
                        </tr>

                            
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div>
        {!! $wordbooks->links() !!}  
    </div>
</div>
@endsection