<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  لوحة التحكم | @yield('title') </title>
    <link rel="stylesheet" href="{{asset('dashboard/bootstrapRTL.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vedors/tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/jquery-ui.min.css')}}">
     <link rel="stylesheet" href="{{asset('dashboard/style.css')}}">
     <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/all.min.css')}}">
    <link rel='stylesheet' href="{{asset('dashboard/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.js"></script>


    <link rel="stylesheet" href="{{asset('dashboard/imageuploadify.min.css')}}">
    @stack('style')
   
    </head>
    <body style="direction:rtl" class="ar">
    
    <!-- Position it -->
    <div style="position: absolute; top: 40px;z-index:9999; left: 15px;">
  
      <!-- Then put toasts within -->  
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header">
          <strong class="mr-auto">لوحة التحكم</strong>
          <small class="text-muted"></small>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body bg-success text-light" >
        </div>
        </div>
    </div>
        <div class="dashboadrd-section d-flex">
            