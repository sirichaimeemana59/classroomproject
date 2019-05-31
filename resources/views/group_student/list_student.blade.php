@extends('layout.layout')
@section('content')
    {{--@if($text == 2)--}}
        {{--<div class="alert alert-success">--}}
            {{--<strong>Success!</strong> {!! trans('messages.examination.examination_completed') !!}--}}
        {{--</div>--}}
    {{--@endif--}}
    {{-- //search --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.student.list_student') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.name') !!}" name="name">
                                </div>

                                {{--<div class="col-sm-3 block-input">--}}
                                {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                                {{--</div>--}}
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                    <button type="button" class="btn btn-secondary search-student">{!! trans('messages.search') !!}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //search --}}
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.student.list_student') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-student-list">
                            @include('group_student.list_student_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--Group--}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.group_student.add') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        {{--<div class="row">--}}
                        {{--<div class="col-sm-12 text-right">--}}
                        {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right add-subject"><i class="mdi mdi-account-multiple-plus"></i>  {!! trans('messages.subjects.list_subjects') !!}</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <br>
                        <div class="panel-body" id="">
                            {!! Form::model(null,array('url' => array('/teacher/group_student/add'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <table class="table table-responsive itemTables" style="width: 100%">
                                <tr>
                                    <th ></th>
                                    <th>{!! trans('messages.photo') !!}</th>
                                    <th>{!! trans('messages.name-last') !!}</th>
                                    <th>{!! trans('messages.action') !!}</th>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <th width="65%"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="text-align: right;"><button class="btn btn-primary mt-2 mt-xl-0 text-right save-regis" type="submit"><i class="mdi mdi-package-down"></i></button></td>
                                </tr>
                            </table>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--End Groups--}}

@endsection

@section('script')
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href ='/admin/student';
            });

            $('.search-student').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                //console.log(data);
                $('#landing-student-list').css('opacity','0.6');
                $.ajax({
                    url : '/admin/student',
                    method : 'post',
                    dataType : 'html',
                    data : data,
                    success : function(e){
                        $('#landing-student-list').css('opacity','1').html(e);
                    } ,error : function(){
                        console.log('Error Search Data Student');
                    }
                });
            });

            $('.add-group').on('click',function(){
                var id = $(this).data('id');
                var id_subject = $(this).data('id-subject');
                var name = $(this).data('name');
                var photo = $(this).data('photo');
                var time = $.now();

                var data = ['<tr class="itemRow">',
                    '<td></td>',
                    '<td><img src="'+photo+'" alt="" width="25%"></td>',
                    '<td><input type="hidden" name="data['+time+'][id_subject]" value="'+id_subject+'"><input type="hidden" name="data['+time+'][id_student]" value="'+id+'"><span>'+name+'</span></td>',
                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                ];

                data.push(
                    '<td><div class="text-right">' +
                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden"></td>','</tr>');
                data = data.join('');

                $('.itemTables').append(data);
                $('.save-regis').show();

            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
            });
        });
    </script>
@endsection