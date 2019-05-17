{!! Form::model($teacher,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row" align="center">
    <div class="col-sm-4" style="margin: auto auto;">
       <p style="text-align: center;"><img src="{!! asset($teacher->photo) !!}" class="img-rounded" alt="Cinque Terre Responsive image" width="125%" height="125%"></p>
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.name') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_teacher',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.name'),'required','readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.last_name') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('lastname_teacher',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.last_name'),'required','readonly')) !!}
    </div>
</div>


<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.address') !!}</lable>
    <div class="col-sm-10">
        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
        {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => 10, 'cols' => 70,'readonly']) !!}
    </div>
</div>

<div class="form-group row">

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.birthdate') !!}</lable>
    <div class="col-sm-4">
        {!! Form::date('brithdate',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.birthdate'),'required','readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.tell') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.tell'),'required','readonly')) !!}
    </div>

</div>
{!! Form::close() !!}