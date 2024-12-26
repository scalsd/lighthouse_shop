@extends('backend.layouts.master')

@section('content')
<div id="main-content" class="custom-background">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><img src="{{asset('backend/assets/images/left-arrow.png')}}" alt="picture" style="width: 15px; height: 15px; padding-top: 2px"></i></a><span class="admin-panel-title">Список пользователей</span></h2>
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
                                            <th>Имя</th>
                                            <th>Имя пользователя</th>
                                            <th>Email</th>
                                            <th>Пароль</th>
                                            <th>Роль</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>                            
                                    <tbody>
                                    @foreach($users as $item)   
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td style="word-wrap: break-word; white-space: pre-line;">   
                                                {!! html_entity_decode($item->name) !!}
                                            </td>
                                            <td style="word-wrap: break-word; white-space: pre-line;">   
                                                {!! html_entity_decode($item->username) !!}
                                            </td>
                                            <td style="word-wrap: break-word; white-space: pre-line;">   
                                                {!! html_entity_decode($item->email) !!}
                                            </td>
                                            <td style="word-wrap: break-word; white-space: pre-line;">   
                                                {!! html_entity_decode($item->password) !!}
                                            </td>
                                            <td style="word-wrap: break-word; white-space: pre-line;">   
                                                {!! html_entity_decode($item->role) !!}
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="Активный" data-offlabel="Неактивный" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="{{route('user.edit',$item->id)}}" class="float-left btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Редактировать" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                    <form class="float-left ml-1" method="POST" action="{{route('user.destroy',[$item->id])}}">
                                                    @csrf 
                                                    @method('delete')
                                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$item->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Удалить"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12" style="display: flex; justify-content: flex-end; padding-right: 20px; padding-bottom: 16px;">
                            <button type="button" class="btn btn-outline-secondary" style="background-color: #986f31; color:#303030;" onclick="window.location.href='{{ route('user.create') }}';">Добавить пользователя</button>
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
                url:"{{route('user.status')}}",
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