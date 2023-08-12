@extends('backend.layouts.template')
@section('css')
<style></style>
@endsection
@section('main-content')    

<div class="dashboard-form">
    <div class="row">
        @include('flash-message')
        <form  action="{{ route('admin.wordbook.update', $edit->id) }}" method="post">
                @csrf 
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Update Word <a href="{{ url()->previous() }}"><span class="button gray">Back</span></a></h4>
                    <div class="dashboard-list-box-static">                        
                        <!-- Details -->
                        <div class="my-profile">                            
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="bengali_word"><strong>{{ __('Bengali Word') }}</strong></label>                           
                                    <input id="bengali_word" name="bengali_word" type="text" value="{{ $edit->bengali_word }}" class="form-control @error('bengali_word') is-invalid @enderror" required autocomplete="bengali_word" autofocus>
                                        @error('bengali_word')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="arabic_word"><strong>{{ __('Arabic Word') }}</strong></label>                           
                                    <input id="arabic_word" name="arabic_word" type="text" value="{{ $edit->arabic_word }}" class="form-control @error('arabic_word') is-invalid @enderror" required autocomplete="arabic_word" autofocus>
                                        @error('arabic_word')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="english_word"><strong>{{ __('English Word') }}</strong></label>                           
                                    <input id="english_word" name="english_word" type="text" value="{{ $edit->english_word }}" class="form-control @error('english_word') is-invalid @enderror" required autocomplete="english_word" autofocus>
                                        @error('english_word')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                              
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="book_name"><strong>{{ __('Book Name') }}</strong></label>
                                    <input id="book_name" name="book_name" type="text" value="{{ $edit->book_name }}" class="form-control @error('book_name') is-invalid @enderror" autofocus><br>
                                        @error('book_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="lesson_name"><strong>{{ __('Lesson No') }}</strong></label>
                                    <input id="lesson_name" name="lesson_name" type="text" value="{{ $edit->lesson_name }}" class="form-control @error('lesson_name') is-invalid @enderror" autofocus>
                                        @error('lesson_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <label for="lesson_name"><strong>&nbsp;</strong></label>
                                    <button type="submit" class="button">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>                       
                </div>
            </div>           
        </form>
    </div>
</div>      
@endsection
@section('scripts')
<script>
</script>
@endsection