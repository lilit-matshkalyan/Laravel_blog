<div id="custom-content" class="modal-block modal-block-md" style="max-width: 80% !important;">
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                {!! Html::image('public/img/loading_bar.gif','loading...',['class'=>'form-loading']) !!}
                <button class="btn btn-default modal-dismiss" > <i class="fa fa-close btn-link"></i></button>
            </div>
            <h2 class="panel-title">{{Help::languages('Add New')}} {{Help::languages('Employee')}}</h2>
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
            {!! Form::open(['url'=>'employees','method'=>'post','class'=>'form-horizontal','id'=>'form','files'=>'true','novalidate'=>'novalidate']) !!}
                <div class="form-group">
                <label class="col-md-2 control-label">{{Help::languages('Job Title')}} <span class="required" >*</span></label>
                <div class="col-md-3">
                    <div class="input-group select-with-add">
                        <span class="input-group-btn">
                             <button class="btn btn-default simple-ajax-modal" href="jobs/create" title=" Add New " > <i class="fa fa-plus btn-link"></i></button>
                        </span>
                        <select required data-plugin-selectTwo class="form-control populate" name="job_id" >
                            <option value=""></option>
                            @foreach($jobs as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('First Name')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control" name="first_name" >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Middle Name')}} </label>
                    <div class="col-md-4">
                        <input type="text"   class="form-control" name="middle_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Last Name')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text"  required  class="form-control" name="last_name" >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Father Name')}} </label>
                    <div class="col-md-4">
                        <input type="text"   class="form-control" name="father_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Gender')}}  <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <select required data-plugin-selectTwo class="form-control populate" name="gender" >
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Birthday')}} <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <div class="input-group input-group-icon">
                            <input type="text" class="form-control form-datepicker" name="birth_day" data-plugin-datepicker required >
                            <span class="input-group-addon"><span class="icon"><i class="fa fa-calendar"></i></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Mobile')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control mobile-masked" name="mobile"  title="Please enter a valid mobile address." >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Email')}}  <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <input type="email" required  class="form-control" name="email" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('ID / Iqama')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control" name="identity_card" >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Passport')}} <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <input type="text" required  class="form-control" name="passport" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Badge Number')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" required  class="form-control" name="badje_number" >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Joining Date')}} <span class="required" >*</span></label>
                    <div class="col-md-4">
                        <div class="input-group input-group-icon">
                            <input type="text" class="form-control form-datepicker" name="joining_day" data-plugin-datepicker required >
                            <span class="input-group-addon"><span class="icon"><i class="fa fa-calendar"></i></span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Basic Salary')}} </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control salary" name="basic_salary" min="0" title="Please enter a valid number." >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Housing Allowance')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control salary" name="housing" min="0" title="Please enter a valid number."  >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Transportation')}}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control salary" name="transportation" min="0" title="Please enter a valid number." >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Other Allowances')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control salary" name="other_allowances" min="0"  title="Please enter a valid number." >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" >{{Help::languages('Salary')}} <span class="required" >*</span></label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="salary" name="salary" min="0" readonly required  title="Please enter a valid number." >
                    </div>
                    <label class="col-md-2 control-label" >{{Help::languages('Vacations')}} </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="vacations" min="0"  title="Please enter a valid number." >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Tickets')}}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="tickets" min="0" title="Please enter a valid number." >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Bonuses')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="bonuses" min="0"  title="Please enter a valid number." >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Pay Rise')}}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="pay_rise" min="0" title="Please enter a valid number." >
                    </div>
                    <label class="col-md-2 control-label">{{Help::languages('Percentage')}}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="salles_percentage" min="0"  title="Please enter a valid number." >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 control-label"></div>
                    <input type="hidden" name="photo" id="photo" >
                    <div id="adding-error" class="col-sm-9 error" ></div>
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
        ImageName                   : '{{date('Y-m-d-H-i-s')}}',
        ImageButtonCSS              : {width :35, height:35},
        CropModes                   : {free:true,widescreen:false,letterbox:false},
        CropWindowStyle             : "Bootstrap",
        UploadedCallback: function(data){
            $("#photo").val(data.currentFileName);

        }
    });

    //  Datepicker for model
    $('.form-datepicker').datepicker();

    // mobile input Mask
    $(".mobile-masked").mask("999 99 999 9999");

</script>

<style>
    .ui-dialog{
        z-index: 1000000000;
    }
</style>