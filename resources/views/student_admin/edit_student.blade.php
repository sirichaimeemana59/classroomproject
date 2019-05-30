{!! Form::model($student,array('url' => array('admin/edit_student_form'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row" align="center">
    <div class="col-sm-4" style="margin: auto auto;">
        <p style="text-align: center;"><img src="{!! asset($student->photo) !!}" class="img-rounded" alt="Cinque Terre Responsive image" width="125%" height="125%"></p>
    </div>
</div>
<input type="hidden" name="photo_hidden" value="{!! $student->photo !!}">
<input type="hidden" name="id" value="{!! $student->id_student !!}">
<input type="hidden" name="code" value="{!! $student->code !!}">
<input type="hidden" name="id_user" value="{!! $student->join_user->id !!}">
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.name') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_student',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.name'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.last_name') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('lastname_student',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.last_name'),'required')) !!}
    </div>
</div>


<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.address') !!}</lable>
    <div class="col-sm-10">
        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
        {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => 10, 'cols' => 70]) !!}
    </div>
</div>

<div class="form-group row">

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.birthdate') !!}</lable>
    <div class="col-sm-4">
        {!! Form::date('brithdate',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.birthdate'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.tell') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.tell'),'required')) !!}
    </div>

</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.photo') !!}</lable>
    <div class="col-sm-4">
        {!! Form::file('photo',null,array('class'=>'form-control')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.email') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.email'),'required')) !!}
        <input type="hidden" name="email_" value="{!! $student->email !!}">
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.pass') !!}</lable>
    <div class="col-sm-4">
        {!! Form::password('password',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.pass'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.teacher.con_pass') !!}</lable>
    <div class="col-sm-4">
        {!! Form::password('password_',null,array('class'=>'form-control','placeholder'=>trans('messages.teacher.con_pass'),'required')) !!}
    </div>
</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}