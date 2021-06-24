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
                        <label for="action" class="col-form-label">مكان التوجيه عند الضغط علي الاعلان:</label>
                        <input type="text" class="form-control" name="action">
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="col-form-label">ادخل ميعاد بداية ظهور الاعلان:</label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-form-label">ادخل ميعاد نهاية ظهور الاعلان:</label>
                        <input type="date" class="form-control" name="end_date">  
                    </div>


                    <div class="form-group">
                        <label for="end_date" class="col-form-label">ظهور الاعلان:</label>
                        <select class="form-control" name="type">
                                <option value="home">الرئيسية</option>
                                <option value="novels">الرويات</option>
                                <option value="topics">الموضوعات</option>
                            
                        </select> 
                    </div>


                    <div class="form-group">
                        <label for="end_date" class="col-form-label">الرويات:</label>
                        <select class="form-control" name="novels_id">
                        <option value="0">...</option>
                              @foreach(\App\Models\novels::where('is_active','=',1)->get() as $key)
                              <option value="{{$key->id}}">{{$key->name}}</option>
                              @endforeach
                            
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="end_date" class="col-form-label">الموضوعات:</label>
                        <select class="form-control" name="topics_id">
                             <option value="0">...</option>
                              @foreach(\App\Models\topics::where('is_active','=',1)->get() as $key)
                              <option value="{{$key->id}}">{{$key->title}}</option>
                              @endforeach
                            
                        </select> 
                    </div>


                    




                    <div class="form-group">
                        <label for="image" class="col-form-label">اختر الصورة:</label>
                        <input type="file" class="form-control" name="image">  
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