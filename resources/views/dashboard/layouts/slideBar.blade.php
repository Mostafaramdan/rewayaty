<aside class="main-sidebar open">
      <div class="sidebar-heading d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">مرحبا {{Auth::guard('dashboard')->user()->name}}  </a>
        <i class="fas fa-bars fa-lg icon toggle-sidebar-icon d-none d-xl-block"></i>
        <i class="fas fa-times fa-lg icon toggle-sidebar-icon d-block d-xl-none"></i>
      </div>
      <ul class="nav d-block sidebar-links-container">
        <li class="nav-item  statistics">
          <a class="nav-link {{ Request::is('*statistics*') ? 'active ' : '' }}" href="{{route('dashboard.statistics.index')}}"><i class="fas fa-chart-line mr-2"></i> <span>التقارير</span></a>
        </li>
        <li class="nav-item  users">
          <a class="nav-link {{ Request::is('*users*') ? 'active ' : '' }}" href="{{route('dashboard.users.index')}}"><i class="fas fa-users mr-2"></i> <span>المستخدمين</span></a>
        </li>
        <li class="nav-item notifications">
          <a class="nav-link {{ Request::is('*notifications*') ? 'active ' : '' }}" href="{{route('dashboard.notifications.index')}}"><i class="far fa-bell  mr-2"></i><span>الإشعارات</span></a>
        </li>
        <li class="nav-item contacts">
          <a class="nav-link {{ Request::is('*contacts*') ? 'active ' : '' }}" href="{{route('dashboard.contacts.index')}}"><i class="fas fa-envelope-open-text mr-2" ></i><span>الشكاوي والإقتراحات</span></a>
        </li>
        <li class="nav-item categories">
          <a class="nav-link {{ Request::is('*categories*') ? 'active ' : '' }}" href="{{route('dashboard.categories.index')}}"><i class="fas fa-list mr-2"></i><span>الأقسام</span></a>
        </li>
        <li class="nav-item regions">
          <a class="nav-link {{ Request::is('*regions*') ? 'active ' : '' }}" href="{{route('dashboard.regions.index')}}"><i class="fas fa-globe mr-2"></i><span>الدول /المدن</span></a>
        </li>
        <li class="nav-item news">
          <a class="nav-link {{ Request::is('*news*') ? 'active ' : '' }}" href="{{route('dashboard.news.index')}}"><i class="fas fa-newspaper mr-2"></i><span> الاخبار</span></a>
        </li>
        <li class="nav-item topics">
          <a class="nav-link {{ Request::is('*topics*') ? 'active ' : '' }}" href="{{route('dashboard.topics.index')}}"><i class="fas fa-band-aid mr-2"></i><span> المواضيع</span></a>
        </li>
        <li class="nav-item novels">
          <a class="nav-link {{ Request::is('*novels*') ? 'active ' : '' }}" href="{{route('dashboard.novels.index')}}"><i class="fas fa-book mr-2"></i><span> الروايات</span></a>
        </li>
        <li class="nav-item sliders">
          <a class="nav-link {{ Request::is('*sliders*') ? 'active ' : '' }}" href="{{route('dashboard.sliders.index')}}"><i class="fab fa-adversal fa-1x mr-2"></i><span>صور الاسليدر</span></a>
        </li>


        <li class="nav-item ads">
          <a class="nav-link {{ Request::is('*ads*') ? 'active ' : '' }}" href="{{route('dashboard.ads.index')}}"><i class="fab fa-adversal fa-1x mr-2"></i><span>الأعلانات</span></a>
        </li>


        <li class="nav-item fonts">
          <a class="nav-link {{ Request::is('*fonts*') ? 'active ' : '' }}" href="{{route('dashboard.fonts.index')}}"><i class="fab fa-etsy fa-1x mr-2"></i><span>الخطوط</span></a>
        </li>
        <li class="nav-item musics">
          <a class="nav-link {{ Request::is('*musics*') ? 'active ' : '' }}" href="{{route('dashboard.musics.index')}}"><i class="fas fa-music fa-1x mr-2"></i><span>الموسيقي</span></a>
        </li>
        <li class="nav-item effects">
          <a class="nav-link {{ Request::is('*effects*') ? 'active ' : '' }}" href="{{route('dashboard.effects.index')}}"><i class=" fas fa-stroopwafel fa-spin fa-1x mr-2"></i><span>المؤثرات</span></a>
        </li>
        <li class="nav-item backgrounds">
          <a class="nav-link {{ Request::is('*backgrounds*') ? 'active ' : '' }}" href="{{route('dashboard.backgrounds.index')}}"><i class="fas fa-square  fa-1x mr-2"></i><span>الخلفيات</span></a>
        </li>
        <li class="nav-item role_type">
          <a class="nav-link {{ Request::is('*role_type*') ? 'active ' : '' }}" href="{{route('dashboard.role_type.index')}}"><i class="fas fa-chess-queen  fa-1x mr-2"></i><span>انواع العضوية</span></a>
        </li>
        <li class="nav-item admins">
          <a class="nav-link {{ Request::is('*admins*') ? 'active ' : '' }}" href="{{route('dashboard.admins.index')}}"><i class="fas fa-user fa-1x mr-2"></i><span>المسؤولين</span></a>
        </li>
        <li class="nav-item app_settings">
          <a class="nav-link {{ Request::is('*app_settings*') ? 'active ' : '' }}" href="{{route('dashboard.app_settings.index')}}"><i class="fas fa-cogs  mr-2"></i><span>إعدادات التطبيق </span></a>
        </li>
        </li>
      </ul>
</aside>