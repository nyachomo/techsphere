<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

  <link rel="stylesheet" href="{{asset('admin/editor/rte_theme_default.css')}}" />
  <script type="text/javascript" src="{{asset('admin/editor/rte.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/editor/all_plugins.js')}}"></script>
  


  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">


  <!--csrf_token-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
  <!--fontawesome-->
  <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
 <style>
  *{
    font-size:14px;
   /* width: 100 !important%;
    max-width: 100% !important;*/
  }

  sup{
    color:red;
  }
.btn-group{
  float:right !important;
}
  .modal-footer{
    border:1px solid #ffffff !important;
  }
  .darkBlue{
    background-color:#000033 !important;
    color:#ffffff !important;
    border:1px solid #000033 !important;
  }

  .orange{
    background-color:#fe730c !important;
    color:#ffffff !important;
    border:1px solid #fe730c !important;
  }

  .lightColor{
    background-color:#33cccc !important;
    color:#ffffff !important;
    border:1px solid #33cccc !important;
  }



  thead{
    background-color:#000033 !important;
    color:white;
  }

  .addButton{
    background-color:#000033 !important;
    color:white;
  }

  .themecolor{
    background-color:#000033 !important;
  }

  .nameLink{
    font-size:30px !important;
    color:#000033 !important;
    font-weight:200px;
  }

  .las1{
    color:#39ac73 !important;
  }

  .las2{
    color:#ffa31a !important;
  }

  .las3{
    color:#ff0000 !important;
  }

  .btn-warning{
    color:white !important;
  }
 </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding-bottom:25px;padding-top:20px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" style="padding-top:1px;">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="font-size:30px;color:#000033"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nameLink" style="color:#000033">TECHSPHERE  INSTITUTE</a>
      </li>

     
      

    </ul>

   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link btn btn-success" data-toggle="dropdown" href="#" style="width:200px;background-color:#00ff00;border-radius:50px;border:1px solid #00ff00">
            Swich Roles
         
          <span class="badge badge-danger navbar-badge"></span>
        </a>
       
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" style="height:42px;background-color:red;">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 themecolor">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="background-color:white;">
      <img src="{{asset('images/user_profile/logo.png')}}"
           alt="TechSphere" style="width:60%;height:70px">
      <span class="brand-text font-weight-light">TECHSPHERE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user_profile/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::check())
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          @else
          <a href="#" class="d-block">Guest</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::check())  
              @if(Auth::user()->role=='Student')
                    <li class="nav-item has-treeview ">
                      <a href="#" class="nav-link ">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        My Account
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                              <a href="{{route('student.profile')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{route('studenteducation')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Education Experience</p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{route('student.workexperience')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Work Experience</p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{route('student.showReferee')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Referees</p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{route('showStudentProfileDocument')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Documents</p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{route('showStudentProfileSummary')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile Summary</p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{route('showcompanySettings')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Settings</p>
                              </a>
                            </li>

                        
                        
                      
                      </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                Logout
                              </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
              @endif





              @if(Auth::user()->role=='Data Clerk')

                  <li class="nav-header">LEEDS</li>
                  <li class="nav-item">
                    <a href="{{route('showLeeds')}}" class="nav-link">
                      <i class="nav-icon fas fa-users las1"></i>
                      <p>
                        STUDENTS
                      </p>
                    </a>
                  </li>



                    

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                Logout
                              </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
              @endif





            @endif
      
        @if(!Auth::user())
          <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Users
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('admin.users.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show</p>
                  </a>
                </li>
              
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Students
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('admin.student.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show</p>
                  </a>
                </li>
              
              </ul>
            </li>

            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Course
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('courses')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show</p>
                  </a>
                </li>
              
              </ul>
            </li>

            <li class="nav-item has-treeview ">
              <a  href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Companies
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('admin.companies.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show</p>
                  </a>
                </li>
              
              </ul>
            </li>

            <li class="nav-item has-treeview ">
              <a  href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Communications
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('admin.cummunications')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show</p>
                  </a>
                </li>
              
              </ul>
            </li>

            <li class="nav-item has-treeview ">
              <a  href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Jobs
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                <li class="nav-item">
                  <a href="{{route('admin.jobs')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show</p>
                  </a>
                </li>
              
              </ul>
            </li>


          </ul>
        @endif
        

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('sweetalert::alert')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>




<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
  $(function () {
    $("#workExperience").DataTable();
    $("#educationExperience").DataTable();
    $("#educationAchievements").DataTable();
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>


<script>
    var editor1 = new RichTextEditor("#inp_editor1");
</script>

<script>
    var editor1 = new RichTextEditor("#vacancy_description");
</script>

<script>
    var editor1 = new RichTextEditor("#vacancy_responsibility");
</script>

<script>
    var editor1 = new RichTextEditor("#vacancy_qualification");
</script>
















<!--sweet alert messages-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('scripts')
</body>
</html>
