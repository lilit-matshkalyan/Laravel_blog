<div id="custom-content" class="modal-block modal-block-md" style="max-width: 80% !important;">
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                {!! Html::image('public/img/loading_bar.gif','loading...',['class'=>'form-loading']) !!}
                <button class="btn btn-default modal-dismiss" > <i class="fa fa-close btn-link"></i></button>
            </div>
            <h2 class="panel-title">{{Help::languages('Add New')}} {{Help::languages('Job')}}</h2>
        </header>
        <div class="panel-body">
            {!! Form::open(['url'=>'jobs','method'=>'post','class'=>'form-horizontal','id'=>'form','files'=>'true','novalidate'=>'novalidate']) !!}
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Code')}} <span class="required" >*</span></label>
                    <div class="col-md-9">
                        <input type="text" required="" placeholder="" class="form-control" name="code" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Name')}} <span class="required" >*</span></label>
                    <div class="col-md-9">
                        <input type="text" required="" placeholder="" class="form-control" name="name" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">{{Help::languages('Description')}}</label>
                    <div class="col-md-9">
                        <textarea placeholder="" class="form-control" rows="5" name="description" ></textarea>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-2 control-label"></div>
                <div id="adding-error" class="col-md-9  error" ></div>
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