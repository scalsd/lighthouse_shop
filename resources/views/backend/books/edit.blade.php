@extends('backend.layouts.master')

@section('content')
    <div id="main-content" class="custom-background">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><img src="{{asset('backend/assets/images/left-arrow.png')}}" alt="picture" style="width: 15px; height: 15px; padding-top: 2px"></i></a><span class="admin-panel-title">Редактировать книгу</span></h2>
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
                            <form action="{{route('book.update', $book->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Название <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Название" name="title" style="background-color: #d4d3ce;" value="{{$book->title}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for=""style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Добавить изображение</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="background-color: #986f31; color:#303030;">
                                                    <i class="fa fa-picture-o" ></i> Выбрать
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" style="background-color: #d4d3ce;" type="text" name="book_cover" value="{{$book->book_cover}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Автор <span class="text-danger">*</span></label>
                                    <select name="author_id" class="form-control show-tick" style="background-color: #d4d3ce">
                                        <option value="">Автор</option>
                                        @foreach (\App\Models\Author::get() as $author)
                                            <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Категория <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control show-tick" style="background-color: #d4d3ce">
                                        <option value="">Категория</option>
                                        @foreach (\App\Models\Category::get() as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Серия <span class="text-danger">*</span></label>
                                    <select name="series_id" class="form-control show-tick" style="background-color: #d4d3ce">
                                        <option value="">Серия</option>
                                        @foreach (\App\Models\Series::get() as $series)
                                            <option value="{{ $series->id }}" {{ $series->id == $book->series_id ? 'selected' : '' }}>
                                                {{ $series->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Издательство <span class="text-danger">*</span></label>
                                    <select name="publishing_house_id" class="form-control show-tick" style="background-color: #d4d3ce">
                                        <option value="">Издательство</option>
                                        @foreach (\App\Models\Publishing_house::get() as $house)
                                            <option value="{{ $house->id }}" {{ $house->id == $book->publishing_house_id ? 'selected' : '' }}>
                                                {{ $house->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Возрастное ограничение</label>
                                        <select name="age_limit" class="form-control" style="width: 100%; background-color: #d4d3ce">
                                            <option value="">Возраст</option>
                                            <option value="0+" {{ $book->age_limit == '0+' ? 'selected' : '' }}>0+</option>
                                            <option value="6+" {{ $book->age_limit == '6+' ? 'selected' : '' }}>6+</option>
                                            <option value="12+" {{ $book->age_limit == '12+' ? 'selected' : '' }}>12+</option>
                                            <option value="16+" {{ $book->age_limit == '16+' ? 'selected' : '' }}>16+</option>
                                            <option value="18+" {{ $book->age_limit == '18+' ? 'selected' : '' }}>18+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Тип переплета</label>
                                        <select name="binding_type" class="form-control" style="width: 100%; background-color: #d4d3ce">
                                            <option value="">Переплет</option>
                                            <option value="Мягкий переплет" {{ $book->binding_type == 'Мягкий переплет' ? 'selected' : '' }}>Мягкий переплет</option>
                                            <option value="Твердый переплет" {{ $book->binding_type == 'Твердый переплет' ? 'selected' : '' }}>Твердый переплет</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Год издания</label>
                                        <input type="number" class="form-control" placeholder="Год" name="year" style="background-color: #d4d3ce;" value="{{$book->year}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Количество страниц</label>
                                        <input type="number" class="form-control" placeholder="Количество страниц" name="amount_pages" style="background-color: #d4d3ce;" value="{{$book->amount_pages}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Формат</label>
                                        <input type="text" class="form-control" placeholder="Формат" name="format" style="background-color: #d4d3ce;" value="{{$book->format}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Вес</label>
                                        <input type="number" class="form-control" placeholder="Вес" name="weight" style="background-color: #d4d3ce;" value="{{$book->weight}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                <label for=""style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Описание</label>
                                    <div class="form-group" style="background-color: #d4d3ce;">
                                        <textarea id="description" class="form-control"  placeholder="Напишите текст..." name="description" style="background-color: #d4d3ce;">{{$book->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">ISBN <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="ISBN" name="isbn" style="background-color: #d4d3ce;" value="{{$book->isbn}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Количество <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Количество" name="stock" style="background-color: #d4d3ce;" value="{{$book->stock}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Цена <span class="text-danger">*</span></label>
                                        <input type="number" step="any"  class="form-control" placeholder="Цена" name="price" style="background-color: #d4d3ce;" value="{{$book->price}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label for="" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-style: normal; color: #d4d3ce; padding-top: 2px;">Статус <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" style="width: 100%; background-color: #d4d3ce">
                                            <option value="">Статус</option>
                                            <option value="active" {{ $book->status == 'active' ? 'selected' : '' }}>Активный</option>
                                            <option value="inactive" {{ $book->status == 'inactive' ? 'selected' : '' }}>Неактивный</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary" style="background-color: #986f31; color:#303030;">Отправить</button>
                                    <button type="button" class="btn btn-outline-secondary" style="background-color: #986f31; color:#303030;" onclick="window.location.href='{{ route('book.index') }}';">Отменить</button>
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
            $('#description').summernote();
        });
  </script>
@endsection