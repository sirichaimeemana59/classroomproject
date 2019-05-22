{!! Form::model($subject,array('url' => array('teacher/edit_subject/form'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <input type="hidden" name="id" value="{!! $subject->id_subject !!}">
    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_subject_th',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.subject_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_subject_en',null,array('class'=>'form-control','placeholder'=>trans('messages.subjects.subject_th'),'required')) !!}
    </div>
</div>

        <?php
            $time_start = array(
                0 => "08:30",
                1 => "09:20",
                2 => "10:15",
                3 => "11:05",
                4 => "11:55",
                5 => "12:45",
                6 => "13:35",
                7 => "14:30",
                8 => "15:20",
                9 => "16:10",
                10 => "17:00",
                11 => "18:10"
            );

            $time_stop = array(
                0 => "08:30",
                1 => "09:20",
                2 => "10:15",
                3 => "11:05",
                4 => "11:55",
                5 => "12:45",
                6 => "13:35",
                7 => "14:30",
                8 => "15:20",
                9 => "16:10",
                10 => "17:00",
                11 => "18:10"
            );

            $day = array(
                0 => trans('messages.day.Monday'),
                1 => trans('messages.day.Tuesday'),
                2 => trans('messages.day.Wednesday'),
                3 => trans('messages.day.Thursday'),
                4 => trans('messages.day.Friday'),
                5 => trans('messages.day.Saturday'),
                6 => trans('messages.day.Sunday')
            );

        ?>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.amount') !!}</lable>
    <div class="col-sm-4">
        {{--<textarea name="detail" class="form-control" id="" cols="60" rows="10" style="margin: 0px -295.672px 0px 0px; width: 466px; height: 211px;"></textarea>--}}
        {!! Form::number('amount',null,array('class'=>'form-control','max'=>50,'min'=>1),'required') !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.day_') !!}</lable>
    <div class="col-sm-4">
        <select name="day" id="" required class="form-control">
            <option value="">--{!! trans('messages.select_day') !!}--</option>
            @foreach($day as $key => $row)
                <option value="{!! $key !!}" @if($key == $subject->day) selected @endif>{!! $row !!}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_start') !!}</lable>
    <div class="col-sm-4">
        <select name="time_start" id="" required class="form-control">
            <option value="">--{!! trans('messages.select_time') !!}--</option>
            @foreach($time_start as $key => $row)
                    <option value="{!! $key !!}" @if($key == $subject->time_start) selected @endif>{!! $row !!}</option>
            @endforeach
        </select>
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.subjects.time_stop') !!}</lable>
    <div class="col-sm-4">
        <select name="time_start" id="" required class="form-control">
            <option value="">--{!! trans('messages.select_time') !!}--</option>
            @foreach($time_stop as $key => $row)
                    <option value="{!! $key !!}" @if($key == $subject->time_start) selected @endif>{!! $row !!}</option>
            @endforeach
        </select>    </div>

</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}