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
                        <label for="name_ar" class="col-form-label">name_ar:</label>
                        <input type="text" class="form-control" name="name_ar">
                    </div>
                    <div class="form-group">
                        <label for="name_en" class="col-form-label">name_en   :</label>
                        <input type="text" class="form-control" name="name_en">
                    </div>
                    <div class="form-group">
                        <label for="numper_of_pages" class="col-form-label"> numper_of_pages  :</label>
                        <input type="text" class="form-control" name="numper_of_pages">
                    </div>
                    <div class="row mr-10" >
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary " onClick="event.preventDefault();$(this).parents('.row').find('input:file').click();">اختر صورة <i class="fas fa-image"></i></button>
                        </div>
                        <div class="col-md-12">
                          <input type="file" id="img" accept="image/*" hidden data-image="image" >
                          <input type="hidden"  name="image" hidden  >
                          <img id="image" class="img-thumbnail" hidden style="border-radius: 50%;height: 50%;max-width: 50%;max-height: 200px;min-height: 200px;"/>
                          <hr/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="number_of_pages" class="col-form-label"> numper_of_pages  :</label>
                        <input type="number" class="form-control" name="number_of_pages">
                    </div>
                    <div class="form-group">
                        <label for="musics" class="col-form-label"> musics  :</label>
                        <input type="number" class="form-control" name="musics">
                    </div>
                    <div class="form-group">
                        <label for="effects" class="col-form-label"> effects  :</label>
                        <input type="number" class="form-control" name="effects">
                    </div>
                    <div class="form-group">
                        <label for="fonts" class="col-form-label"> fonts  :</label>
                        <input type="number" class="form-control" name="fonts">
                    </div>
                    <div class="form-group">
                        <label for="backgrounds" class="col-form-label"> backgrounds  :</label>
                        <input type="number" class="form-control" name="backgrounds">
                    </div>
                    <div class="form-group">
                        <label for="number_of_month" class="col-form-label"> number_of_month  :</label>
                        <input type="text" class="form-control" name="number_of_month">
                    </div>
                    <div class="form-group">
                        <label for="image_per_page" class="col-form-label"> image_per_page  :</label>
                        <input type="text" class="form-control" name="image_per_page">
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label"> price  :</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label for="number_of_novels_per_month" class="col-form-label"> number_of_novels_per_month  :</label>
                        <input type="text" class="form-control" name="number_of_novels_per_month">
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