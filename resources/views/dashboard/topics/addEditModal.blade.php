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
                        <label for="title" class="col-form-label">العنوان  :</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">الوصف  :</label>
                        @include('dashboard.layouts.ckEditor',['field'=>'description'])
                    </div>
                    <div class="form-group">
                        <label for="tagsinput" class="col-form-label">الكلمات المفتاحية :</label>
                        <input type="text"  name="keywords" class="form-control" data-role="tagsinput">
                    </div>
                    <div class="form-group" >
                        <label for="users_id" class="col-form-label">اختر الشخص:</label>
                        <select  class="form-control" name="users_id">
                            <option value="">بلا</option>

                            @foreach(\App\Models\users::where('is_active',1)->get() as $record)
                                <option value="{{$record->id}}">{{$record->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" >
                        <label for="categories_id" class="col-form-label">اختر القسم:</label>
                        <select  class="form-control" name="categories_id">
                            @foreach(\App\Models\categories::where('is_active',1)->get() as $record)
                                <option value="{{$record->id}}">{{$record->name_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="row mr-10" >
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary " onClick="event.preventDefault();$(this).parents('.row').find('input:file').click();">اختر صورة <i class="fas fa-image"></i></button>
                        </div>
                        <div class="col-md-12">
                          <input type="file" id="img"  accept="image/*" hidden data-image="image" >
                          <input type="hidden"  name="image" hidden  >
                          <img id="image" class="img-thumbnail" hidden style="border-radius: 50%;height: 50%;max-width: 50%;max-height: 200px;min-height: 200px;"/>
                          <hr/>
                        </div>
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