<div id="custom-content" class="modal-block modal-block-md" style="max-width: 80% !important;">
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                {!! Html::image('public/img/loading_bar.gif','loading...',['class'=>'form-loading']) !!}
                <button class="btn btn-default modal-dismiss" > <i class="fa fa-close btn-link"></i></button>
            </div>
            <h2 class="panel-title">{{Help::languages('Edit')}} {{Help::languages('Employee')}}</h2>
        </header>
        <div class="panel-body">
            <table border="0" class="container_photo_trable" >
                <tr>
                    <td width="16%"  style="text-align:right">
                        <label class="control-label">{{Help::languages('Avatar')}}</label>
                    </td>
                    <td width="6%"></td>
                    <td>
                        <div id="container_photo" class="container_photo" ></div>
                    </td>
                </tr>

            </table>
            {!! Form::open(['url'=>'employees/'.$employee->id,'method'=>'put','class'=>'form-horizontal','id'=>'form','files'=>'true','novalidate'=>'novalidate']) !!}
            <div class="form-group">
                <label class="col-md-2 control-label">{{Help::languages('Job Title')}}  <span class="required" >*</span></label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-btn">
                                 <button class="btn btn-default simple-ajax-modal" href="jobs/create" title=" Add New " > <i class="fa fa-plus btn-link"></i></button>
                            </span>
                        <select required data-plugin-selectTwo class="form-control populate" name="job_id" >
                            <option value=""></option>
                            @foreach($jobs as $value)
                                <option {{$employee->job_id==$value->id?'Selected':''}} value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('First Name')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control" name="first_name" id="first_name" value="{{$employee->first_name}}" >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Middle Name')}} </label>
                    <div class="col-md-4">
                        <input type="text"   class="form-control" name="middle_name"  value="{{$employee->middle_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Last Name')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text"  required  class="form-control" name="last_name" value="{{$employee->last_name}}">
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Father Name')}} </label>
                    <div class="col-md-4">
                        <input type="text"   class="form-control" name="father_name"  value="{{$employee->father_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Gender')}}  <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <select required data-plugin-selectTwo class="form-control populate" name="gender" >
                            <option value=""></option>
                            <option {{$employee->gender=='Male'?'Selected':''}} value="Male">Male</option>
                            <option {{$employee->gender=='Female'?'Selected':''}} value="Female">Female</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Birthday')}} <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <div class="input-group input-group-icon">
                            <input type="text" class="form-control form-datepicker" name="birth_day" data-plugin-datepicker required value="{{$employee->birth_day}}" >
                            <span class="input-group-addon"><span class="icon"><i class="fa fa-calendar"></i></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Mobile')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control mobile-masked" name="mobile"  title="Please enter a valid mobile address." value="{{$employee->mobile}}" >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Email')}}  <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <input type="email" required  class="form-control" name="email" value="{{$employee->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('ID / Iqama')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control" name="identity_card" value="{{$employee->identity_card}}" >
                    </div>
                    <label class="ccol-md-2 control-label">{{Help::languages('Passport')}} <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <input type="text" required  class="form-control" name="passport" value="{{$employee->passport}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Badge Number')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control" name="badje_number" value="{{$employee->badje_number}}">
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Joining Date')}} <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <div class="input-group input-group-icon">
                            <input type="text" class="form-control form-datepicker" name="joining_day" data-plugin-datepicker required value="{{$employee->joining_day}}" >
                            <span class="input-group-addon"><span class="icon"><i class="fa fa-calendar"></i></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Basic Salary')}} </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control salary" name="basic_salary" min="0" title="Please enter a valid number." value="{{$employee->contract->basic_salary}}">
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Housing Allowance')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control salary" name="housing" min="0" title="Please enter a valid number."  value="{{$employee->contract->housing}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Transportation')}}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control salary" name="transportation" min="0" title="Please enter a valid number." value="{{$employee->contract->transportation}}">
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Other Allowances')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control salary" name="other_allowances" min="0"  title="Please enter a valid number." value="{{$employee->contract->other_allowances}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" >{{Help::languages('Salary')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="salary" name="salary" min="0" readonly required  title="Please enter a valid number." value="{{$employee->contract->salary}}">
                    </div>
                    <label class="col-md-2 control-label" >{{Help::languages('Vacations')}} </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="vacations" min="0"  title="Please enter a valid number." value="{{$employee->contract->vacations}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Tickets')}}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="tickets" min="0" title="Please enter a valid number." value="{{$employee->contract->tickets}}">
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Bonuses')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="bonuses" min="0"  title="Please enter a valid number." value="{{$employee->contract->bonuses}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Pay Rise')}}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="pay_rise" min="0" title="Please enter a valid number." value="{{$employee->contract->pay_rise}}">
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Percentage')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="salles_percentage" min="0"  title="Please enter a valid number." value="{{$employee->contract->salles_percentage}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 control-label"></div>
                    <div id="adding-error" class="col-md-9 error" ></div>
                    <input type="hidden" name="photo" id="photo" >
                    <input type="hidden" value="{{$employee->id}}" name="id" >
                </div>
            {!! Form::close() !!}
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary modal-confirm-ajax" >{{Help::languages('Submit')}}</button>
                    <button class="btn btn-default modal-confirm-reset" type="reset">{{Help::languages('Reset')}}</button>
                    <button class="btn btn-default modal-dismiss">{{Help::languages('Cancel')}}</button>
                </div>
            </div>
        </footer>
    </section>
</div>

<script>

    // Calculate salary
    $('.salary').on('keyup',function(){
        var salary = 0;
        $(".salary").each(function() {
            if(parseFloat($(this).val()) > 0)
                salary += parseFloat($(this).val());
        });
        $('#salary').val(salary);
    });

    //  Select2 for model
    $('#custom-content select').select2({
        allowClear: true,
        placeholder: "",
        theme: "bootstrap",
        dropdownParent: $('#custom-content')
    });

    // select2 validation reset
    $('select').on('change', function() {
            $(this).valid();
    });

    // Crop Photo
    $("#container_photo").PictureCut({
        Extensions                  : ["jpg","png","gif","jpeg"],
        InputOfImageDirectory       : "image",
        PluginFolderOnServer        : "{{  @explode("/",url())[3]?(@explode("/",url())[3]):'' }}/vendor/jQuery-Picture-Cut-master/",
        FolderOnServer              : "{{ @explode("/",url())[3]?('/'.@explode("/",url())[3]):''  }}/public/archive/employees/",
        EnableCrop                  : true,
        ImageNameRandom             : false,
        ImageName                   : '{{$employee->first_name.'-'.$employee->middle_name.'-'.$employee->last_name.'-'.$employee->father_name}}',
        ImageButtonCSS              : {width :35, height:35},
        CropModes                   : {free:true,widescreen:false,letterbox:false},
        CropWindowStyle             : "Bootstrap",
        UploadedCallback: function(data){
            $("#photo").val(data.currentFileName);

        }
    });

    // add old avatar
    @if($employee->photo)
        $('#container_photo .picture-element-image').attr('src','{!!url('/public/archive/employees/'.$employee->photo)!!}');
    @endif

    //  Datepicker for model
    $('.form-datepicker').datepicker();

    // mobile input Mask
    $(".mobile-masked").mask("999 99 999 9999");


</script>

