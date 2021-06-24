<div class="modal fade addEdit-new-modal" id="addEdit-new-modal" tabindex="-1" role="dialog" aria-labelledby="addEdit-new-modal"aria-hidden="true">
    <div class="loading-container"  >
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="createUpdate" action="{{route('dashboard.'.Request::segment(2).'.createUpdate')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="about_us_ar" class="col-form-label">عن التطبيق بالعربي :</label>
                        <textarea type="text" class="form-control" name="about_us_ar"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_us_en" class="col-form-label">عن التطبيق بالإنجليزي:</label>
                        <textarea type="text" class="form-control" name="about_us_en"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="policy_terms_ar" class="col-form-label">سياسة الإستخدام بالعربي:</label>
                        <textarea  type="text" class="form-control" name="policy_terms_ar"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="policy_terms_en" class="col-form-label">سياسة الإستخدام بالإنجليزي:</label>
                        <textarea  type="text" class="form-control" name="policy_terms_en"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="emails" class="col-form-label">البريد الالكتورني :</label>
                        <input type="text" id="emails" name="emails" class="form-control" data-role="tagsinput">
                    </div>

            
                    <div class="form-group" >
                        <div class="progress " >
                            <div class="progress-bar"  role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div> 
                    </div>
                </form>
                <div class="alert " >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button"  class="btn btn-success submit" id="submit">save</button>
            </div>

        </div>
    </div>
</div>
</div>