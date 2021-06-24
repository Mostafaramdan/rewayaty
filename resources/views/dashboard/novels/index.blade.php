@extends ('dashboard.layouts.master')
@section('title', 'الروايات')
@section ('content')
    <div class="content" >
    <div  id="alert">

    </div>

        <div class="d-flex align-items-center mb-4">
          <h2 class="m-0"># الروايات </h2>
        </div>

        <form class="mb-4" id="getOptions">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-row">
            
            <div class="m-2">
              <input type="search" class="form-control" placeholder="بحث" name="search">
            </div>

            <div class="m-2">
              <select class="custom-select" name="sortBy">
                <option selected disabled>ترتيب علي حسب</option>
                <option value="name">الاسم</option>
                <option value="created_at">تاريخ الانشاء</option>
              </select>
            </div>

            <div class="m-2">
              <select class="custom-select"  name="sortType">
                <option selected disabled>نوع الترتيب</option>
                <option value="sortBy">تصاعدي</option>
                <option value="sortByDesc">تنازلي</option>
              </select>
            </div>
        </form>

        <div class="flex-grow-1"></div>
              <div class="m-2">
                <button class="btn btn-primary px-5 add" onClick="event.preventDefault();" data-toggle="modal" data-target="#addEdit-new-modal"> إضافة  رواية جديدة <i class="ml-2 fas fa-plus-circle"></i></button>
              </div>
          </div>
        <div class="table-responsive">
          <table class="table bg-light mb-4 tableInfo" id="tableInfo" dir="rtl">
            @include('dashboard.novels.tableInfo')
          </table>
        </div>

        <!-- pagination -->
        <div class="paging">  
          @include('dashboard.layouts.paging')
        </div>
        <!-- end pagination -->
    </div>
      <!-- Large modal -->
      @include('dashboard.novels.viewModal')
      <!-- end Large modal -->

      <!-- addEdit new modal -->
        @include('dashboard.novels.addEditModal')
      <!-- end add user modal -->

      <!-- end main content -->
</div>
@push('script')
<script>
  $("body").on("click",".get-record",function(){
    let id = $(this).parents('tr').data("id");
    $.ajax({
      url: "{{Request::segment(2)}}/getRecord/"+id,
      type: 'GET',
      processData: false,
      contentType: false,
      beforeSend: function(){
        $(".view-modal .loading-container").toggleClass("d-none d-flix");
      },
      success: function(record) {
        $(".view-modal .loading-container").toggleClass("d-none d-flix");
        for (var k in record) {
          if (record.hasOwnProperty(k)) {
            if(k.includes('image')  ){
              $(".carousel-item ."+k).attr("src","{{url('/')}}"+record[k]);
            }else{
              $(".view-modal ."+k).html(record[k])
            }
          }
        }
      }
    });
  });
  $("body").on("click",".edit",function(){
    $(".addEdit-new-modal .modal-title").html("تعديل ");
    $(".addEdit-new-modal input[name='id']").val($(this).parents("tr").data("id"));
    let id = $(this).parents('tr').data("id");
    $.ajax({
      url: "{{Request::segment(2)}}/getRecord/"+id,
      type: 'GET',
      processData: false,
      contentType: false,
      beforeSend: function(){
        $(".addEdit-new-modal .loading-container").toggleClass("d-none d-flix");
      },
      success: function(record) {
        $(".addEdit-new-modal .loading-container").toggleClass("d-none d-flix");
        for (var k in record) {
          if (record.hasOwnProperty(k)) {
            if( k.includes('image') || k.includes('Image')  ){
              if(record[k]){  
                $('img#'+k).attr('src', record[k]).attr("hidden",false);
              }else{
                 $('img #'+k).attr("hidden",true);
              }
            }else if(k == 'password'){
              $(".addEdit-new-modal input[name='"+k+"']").val(null);
              continue;
            }else{
              if(k.charAt(0)== 'i' && k.charAt(1)== "s"){
                if( record[k] == 1){
                  $(".addEdit-new-modal input[name='"+k+"']").attr('checked',true);
                }else{
                  $(".addEdit-new-modal input[name='"+k+"']").attr('checked',false);
                }
              }else{
                $(".addEdit-new-modal input[name='"+k+"']").val(record[k]);
                $(".addEdit-new-modal textarea[name='"+k+"']").val(record[k]);
                $(".addEdit-new-modal select[name='"+k+"'] option[value='"+record[k]+"']").prop('selected', true);
                
              }
            }
          }
        }
        $('.username').html(record.user_name)
        $(`.dropdown-item[val=${record.users_id}]`).addClass('active').siblings().removeClass('active');


        $(".bootstrap-tagsinput").find('.badge-info').remove();
        var keywords =  record.keywords.split(',');
        for (i=0;i<keywords.length; i++){
        newappend =` <span class="badge badge-info"  >${keywords[i]}<span data-role="remove"><input type="hidden" value=${record.keywords} name="keywords"></span></span>`;
        $(".bootstrap-tagsinput").prepend(newappend);
      }

        if(record.images){
          $('.imageuploadify-container').remove();
          for (var i=0; i<record.images.length; i++){
            $('.imageuploadify-images-list').append(`
              <div class="imageuploadify-container" style="margin-left: 12px;">
                <button type="button" class="btn btn-danger glyphicon glyphicon-remove"data-table='images' data-id="${record.images[i].id}" onClick="deleteImagefromDragDrop()"></button>
                <div class="imageuploadify-details" style="opacity: 0;">
                  <span>Capture.PNG</span>
                  <span>image/png</span>
                  <span>159645</span>
                  </div>
                  <img src="${record.images[i].image}">
                </div>
            `);
          }
        }
      }
    });
  });
  $("body").on("click",".badge-info span",function(){
    $(this).parents('.badge-info').remove();
    $(".badge-info").each(function(){
       var keywords=[];
       keywords.push($(this).text());
       $("input[name='keywords']").val(keywords);
    });
   });
  $("body").on("click",".add",function(){
    $(".bootstrap-tagsinput").find('.badge-info').remove();
  });

  var typingTimer;                //timer identifier
        var doneTypingInterval = 1000;  //time in ms, 1 second for example
        var $input = $('input[name="search_for_user"]');

        //on keyup, start the countdown
        $input.on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping1, doneTypingInterval);
        });

        //on keydown, clear the countdown 
        $input.on('keydown', function () {
            clearTimeout(typingTimer);
        });

        $input.on('search', function (e) {
            e.preventDefault();
            doneTyping1();
        });
        $("body").on("click",".dropdown-item",function(){
            $(this).addClass('active').siblings().removeClass('active');
            $('.username').html($(this).data('name'))
            $("input[name='users_id']").val($(this).attr('val'))
        })

        function doneTyping1 () {
           $.ajax({
            url: "{{route('dashboard.users.searchForResult')}}?search="+$('input[name="search_for_user"]').val(),
            type: 'GET',
            processData: false,
            contentType: false,
            success: function(record) {
                $('.dropdown-menu .dropdown-item').remove();
                $('.dropdown-menu').append(record);
            }
          });
        }
</script> 
@endpush
@endsection
        