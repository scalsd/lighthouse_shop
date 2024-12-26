@extends('backend.layouts.master')

@section('content')
    <div id="main-content" class="custom-background">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><img src="{{asset('backend/assets/images/left-arrow.png')}}" alt="picture" style="width: 15px; height: 15px; padding-top: 2px"></i></a><span class="admin-panel-title">Добавить статью</span></h2>
                    </div>            
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12"  style="background-color:#303030;">
                    <div class="card" style="background-color:#242424;">
                        <div class="body">
                            <form action="{{route('post.store')}}" method="post">
                                @csrf
                                <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Название <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Название" name="title" style="background-color: #d4d3ce;" value="{{old('title')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for=""style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Добавить изображение <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="background-color: #986f31; color:#303030;">
                                                    <i class="fa fa-picture-o" ></i> Выбрать
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" style="background-color: #d4d3ce;" type="text" name="photo">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                <label for=""style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Текст <span class="text-danger">*</span></label>
                                    <div class="form-group" style="background-color: #d4d3ce;">
                                        <textarea id="text" class="form-control"  placeholder="Напишите текст..." name="text" style="background-color: #d4d3ce;">{{old('text')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Статус<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" style="width: 100%; background-color: #d4d3ce">
                                            <option value="">---</option>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Активный</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Неактивный</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary" style="background-color: #986f31; color:#303030;">Отправить</button>
                                    <button type="button" class="btn btn-outline-secondary" style="background-color: #986f31; color:#303030;" onclick="window.location.href='{{ route('post.index') }}';">Отменить</button>
                                </div> 
                            </form>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function() {
            $('#text').summernote();
        });
  </script>
@endsection