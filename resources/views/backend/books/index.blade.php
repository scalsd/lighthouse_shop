@extends('backend.layouts.master')

@section('content')
<div id="main-content" class="custom-background">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><img src="{{asset('backend/assets/images/left-arrow.png')}}" alt="picture" style="width: 15px; height: 15px; padding-top: 2px"></i></a><span class="admin-panel-title">Список книг</span></h2>
                    </div>            
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card" style="background-color:#242424;">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover " style="background-color:#d4d3ce; color:#303030">
                                    <thead>
                                        <tr>
                                            <th>Номер</th>
                                            <th>Название</th>
                                            <th>Slug</th>
                                            <th>Автор</th>
                                            <th>Серия</th>
                                            <th>Категория</th>
                                            <th>Издательство</th>
                                            <th>Возрастное ограничение</th>
                                            <th>Год</th>
                                            <th>Количество страниц</th>
                                            <th>Тип переплета</th>
                                            <th>Формат</th>
                                            <th>Вес</th>
                                            <th>Цена</th>
                                            <th>Количество</th>
                                            <th>ISBN</th>
                                            <th>Обложка</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>                            
                                    <tbody>
                                    @foreach($books as $item)   
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>{{ optional($item->author)->name }}</td>
                                            <td>{{ optional($item->series)->title }}</td>
                                            <td>{{ optional($item->category)->title }}</td>
                                            <td>{{ optional($item->publishingHouse)->title }}</td>
                                            <td>{{$item->age_limit}}</td>
                                            <td>{{$item->year}}</td>
                                            <td>{{$item->amount_pages}}</td>
                                            <td>{{$item->binding_type}}</td>
                                            <td>{{$item->format}}</td>
                                            <td>{{$item->weight}} г</td>
                                            <td>{{$item->price}} ₽</td>
                                            <td>{{$item->stock}}</td>
                                            <td>{{$item->isbn}}</td>
                                            <td>
                                                @if($item->book_cover)
                                                    <img src="{{$item->book_cover}}" class="img-fluid zoom" style="max-width:80px" alt="{{$item->book_cover}}">
                                                @else
                                                    <img src="{{asset('backend/assets/images/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="default">
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="Активный" data-offlabel="Неактивный" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#bookID{{$item->id}}" class="float-left btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" title="Информация" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                                    <a href="{{route('book.edit',$item->id)}}" class="float-left btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Редактировать" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                    <form class="float-left ml-1" method="POST" action="{{route('book.destroy',[$item->id])}}">
                                                    @csrf 
                                                    @method('delete')
                                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$item->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Удалить"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <div class="modal fade" id="bookID{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    @php
                                                        $book=\App\Models\Book::where('id', $item->id)->first();
                                                    @endphp
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$book->title}}</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <strong>Описание:</strong>
                                                        <p>{!! html_entity_decode($book->description) !!}</p>
                                                        <strong>Цена:</strong>
                                                        <p>{!! html_entity_decode($book->price) !!} ₽</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>  
                                    @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12" style="display: flex; justify-content: flex-end; padding-right: 20px; padding-bottom: 16px;">
                            <button type="button" class="btn btn-outline-secondary" style="background-color: #986f31; color:#303030;" onclick="window.location.href='{{ route('book.create') }}';">Добавить книгу</button>
                        </div> 
                    </div>                   
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Вы уверены?",
                text: "После удаления вы не сможете восстановить эти данные!",
                icon: "warning",
                buttons: ["Отмена", "Подтвердить"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        })
    </script>
    <script>
        $('input[name=toogle]').change(function() {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url:"{{route('book.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response) {
                    console.log(response.status);
                    // if(response.status) {
                    //     alert(response.msg);
                    // }
                    // else{
                    //     alert('Попробуйте снова!')
                    // }
                }
            })
        });
    </script>
@endsection