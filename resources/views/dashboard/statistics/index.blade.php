@extends ('dashboard.layouts.master')
@section('title', 'التقارير')
@section ('content')
    <div class="content" >
      <div  id="alert">
      </div>
      <div class="d-flex align-items-center mb-4">
        <h2 class="m-0"># التقارير</h2>
      </div>
      <form class="mb-4" id="getOptions">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-row"> 
          <div class="m-2">
            <label> من : </label>
            <input type="date" name="fromDate" class="form-control" placeholder="Search">
          </div>
          <div class="m-2">
            <label> إلي : </label>
            <input type="date" name="toDate" class="form-control" placeholder="Search">
          </div>
          <div  style="margin-top:40px">
            <a class="btn btn-primary text-white getByRang mt" > ارسال</a>
          </div>
      </form>  
    </div>
    <div class="row mb-4">
    <div class="col-md-3 col-sm-6">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header align-items-center font-weight-bold">
            أجمالي المستخدمين
            <i class="fas fa-users mr-2 fa-2x "></i>
          </div>
          <div class="card-body">
            <h5 class="card-title usersCount">{{\App\Models\users::count()}}   </h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card text-white bg-success  mb-3" style="max-width: 18rem;">
          <div class="card-header align-items-center font-weight-bold">
            أجمالي  الروايات
            <i class="fas fa-american-sign-language-interpreting  mr-2 fa-2x"></i>
          </div>
          <div class="card-body">
          <h5 class="card-title providersCount">{{\App\Models\novels::count()}}   </h5>
          </div>
        </div>
      </div>


      <div class="col-md-3 col-sm-6">
        <div class="card text-white bg-success  mb-3" style="max-width: 18rem;">
          <div class="card-header align-items-center font-weight-bold">
            أجمالي  الاشتراكات
            <i class="fas fa-american-sign-language-interpreting  mr-2 fa-2x"></i>
          </div>
          <div class="card-body">
          <h5 class="card-title providersCount">{{\App\Models\purchases::whereNUll('deleted_at')->count()}}   </h5>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-12">
            <canvas id="Chart"></canvas>
        </div>
      </div>  
</div>
@push('script')
<script src="{{ asset('dashboard/chart.js') }}"></script>
<script src="{{ asset('dashboard/sam.js') }}"></script>
<script>
    var ctx = document.getElementById('Chart').getContext('2d');
    var labels = [
        '0',
        'يناير',
        'فبراير',
        'مارس',
        'ابريل',
        'مايو',
        'يونيو',
        'يوليو',
        'أغسطس',
        'سيبتمبر',
        'أكتوبر',
        'نوفمبر',
        'ديسمبر',
    ];

    var datasets = [
        { 
          fill: false,
          label: 'إجمالي المستخدمين ',
          data: sam.fillTheMissedMonthes({!! $users !!}, true),
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          borderWidth: 3
        },
        { 
            fill: false,
            label: 'إجمالي الروايات  ',
            data: sam.fillTheMissedMonthes({!! $novels !!}, true),
            backgroundColor: 'rgb(41, 77, 50)',
            borderColor: 'rgb(41, 77, 50)',
            borderWidth: 3
        }
    ];
    var title =  "الإجمالي";
    sam.loadMultiLineChart(ctx, labels, datasets, title);
    $("body").on("click",".getByRang",function(){
      var data = new FormData();
      data.append('from',$("#getOptions input[name='fromDate']").val());
      data.append('to',$("#getOptions input[name='toDate']").val());
      data.append('_token', $('input[name=_token]').val());
      $.ajax({
        url: "{{Request::segment(2)}}/getByDateRange",
        type: 'POST',
        data:data,
        processData: false,
        contentType: false,
        beforeSend: function(){
          $(".loading-container").toggleClass("d-none d-flix");
        },
        success: function(record) {
          $(".loading-container").toggleClass("d-none d-flix");
          $(".usersCount").html(record.usersCount);
          $(".novelsCount").html(record.novelsCount);
        }
      });
    });
</script>
@endpush
@endsection
        