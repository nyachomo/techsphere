@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>STUDENTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->


<!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header">
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm darkBlue" data-toggle="modal" data-target="#addStudentModal"><i class="las la-plus"></i>ADD NEW STUDENT</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-stripped" id="example1">
                        <thead>
                            <th>ACTION</th>
                            <th>ADMNO</th>
                            <th>IMAGE</th>
                            <th>FULLNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>GENDER</th>
                            <th>COURSE</th>
                        </thead>
                        <tbody>
                                @if($students->count()>0)
                                   @foreach($students as $student)
                                    <tr>
                                        <!--action-->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn lightColor btn-success btn-sm">ACTION</button>
                                                <button type="button" class="btn btn-success lightColor btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                <div class="dropdown-menu" role="menu">
                                                    <center><h4><b>MORE ACTIONS</b></h4></center>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#update_student{{$student->id}}">
                                                    <i class="las la-edit las1"></i> UPDATE ACHIEVEMENT(S)
                                                    
                                                    </a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_profile_image{{$student->id}}">
                                                        <i class="las la-edit las2"></i> UPDATE PROFILE IMAGE
                                                    </a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#viewMoreInfor_leed{{$student->id}}">
                                                        <i class="las la-eye las3"></i> VIEW MORE INFORMATION
                                                    </a>
                                                
                                                </div>
                                                </button>
                                            </div>
                                        </td>
                                        <!--end action-->

                                         <td>{{$student->student_admno}}</td>
                                         <td><img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/user_profile/'.$student->profile_image)}}" style="width:40px"> </td>
                                         <td>{{$student->student_fullname}}</td>
                                         <td>{{$student->student_email}}</td>
                                         <td>{{$student->student_phone}}</td>
                                         <td>{{$student->student_gender}}</td>
                                         <td>{{$student->course->name}}</td>
                                    </tr>

                                    <!--update leed-->
                                        <div class="modal fade" id="update_student{{$student->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">ADD NEW STUDENT</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" action="{{route('updateStudent')}}">
                                                        @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                            <div class="row">
                                                            <input type="text" name="id" value="{{$student->id}}" class="form-control" hidden="true">
                                                            <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>STUDENT ADM NO<sup>*</sup></label>
                                                                        <input type="text"  name="student_admno"  class="form-control" value="{{$student->student_admno}}" disabled>
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>STUDENT FULLNAME <sup>*</sup></label>
                                                                        <input type="text"  name="student_fullname"  class="form-control"  value="{{$student->student_fullname}}" required>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                        <label>STUDENT PHONENUMBER <sup>*</sup></label>
                                                                        <input type="text" class="form-control" name="student_phone" class="form-control" value="{{$student->student_phone}}" required>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>STUDENT EMAIL</label>
                                                                        <input type="text" class="form-control"  name="student_email" class="form-control" value="{{$student->student_email}}">
                                                                    
                                                                    </div>
                                                                </div>

                                                            
                                                            </div>

                                                            <div class="row">

                                                            <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>COURSE</label>
                                                                        <select class="form-control" name="course_id" class="form-control @error('student_gender') is-invalid @enderror" required>
                                                                            <option value="{{$student->course->id}}">{{$student->course->name}}</option>
                                                                            @if($courses->count()>0)
                                                                            @foreach($courses as $course)
                                                                                <option value="{{$course->id}}">{{$course->name}}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        
                                                                        </select>
                                                                    

                                                                    </div>
                                                                </div>


                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>STUDENT GENDER</label>
                                                                        <select class="form-control" name="student_gender"  class="form-control @error('student_gender') is-invalid @enderror"  value="{{ old('student_gender') }}">
                                                                            <option value="MALE">MALE</option>
                                                                            <option VALUE="FEMALE">FEMALE</option>
                                                                        </select>
                                                                        @error('student_gender')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                            </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-plus"></i>ADD</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <!--end update leed-->

                                    <!--update profile image-->
                                    <div class="modal fade" id="update_profile_image{{$student->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">
                                                UPDATE PROFILE IMAGE
                                            </h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                            <div class="modal-body">
                                            

                                                <form role="form" method="POST" action="{{route('student.updateprofileimage')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                                    
                                                    <div class="form-group">
                                                    <label for="exampleInputFile">CHOOSE PROFILE IMAGE</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror"  value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>
                                                        
                                                        @error('profile_image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        </div>
                                                        <div class="input-group-append">
                                                        <button type="submit" name="submit" class="btn btn-secondary">UPLOAD</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- /.card-body -->

                                                </form>



                                            </div>

                                            <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                            
                                            </div>
                                        
                                        
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                    <!--end update profile image-->


                                   @endforeach
                                @endif
                            </tbody>
                    </table>
                </div>
             </div>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--add student modal-->
<!--update profile image-->
<div class="modal fade" id="addStudentModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW STUDENT</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('addStudent')}}">
            @csrf
        <!-- /.card-header -->
        <div class="card-body">
                <div class="row">

                   <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>STUDENT ADM NO<sup>*</sup></label>
                            <input type="text"  name="student_admno"  class="form-control @error('student_admno') is-invalid @enderror"  value="{{ old('student_admno') }}" required>
                            @error('student_admno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>STUDENT FULLNAME <sup>*</sup></label>
                            <input type="text"  name="student_fullname"  class="form-control @error('student_fullname') is-invalid @enderror"  value="{{ old('student_fullname') }}" required>
                            @error('student_fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>STUDENT PHONENUMBER <sup>*</sup></label>
                            <input type="text" class="form-control" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror"  value="{{ old('student_phone') }}"  required>
                            @error('student_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>STUDENT EMAIL</label>
                            <input type="text" class="form-control"  name="student_email" class="form-control @error('student_email') is-invalid @enderror"  value="{{ old('student_email') }}">
                            @error('student_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                   
                </div>

                <div class="row">

                   <div class="col-sm-6">
                        <div class="form-group">
                            <label>COURSE</label>
                            <select class="form-control" name="course_id" class="form-control @error('student_gender') is-invalid @enderror" required>
                                <option value="">SELECT..</option>
                                @if($courses->count()>0)
                                  @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                  @endforeach
                                @endif
                               
                            </select>
                           

                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>STUDENT GENDER</label>
                            <select class="form-control" name="student_gender"  class="form-control @error('student_gender') is-invalid @enderror"  value="{{ old('student_gender') }}">
                                <option value="MALE">MALE</option>
                                <option VALUE="FEMALE">FEMALE</option>
                            </select>
                            @error('student_gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                </div>

        </div>
        <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>ADD</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->
<!--end add student modal-->

<!--error-->
@if ($errors->any())
    <div id="flash-message" class="alert alert-danger alert-dismissible position-fixed" style="top: 40px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Faile. Please check the form  for errors
    </div>
@endif

@endsection

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // setTimeout function to hide the flash message after 5 seconds
        setTimeout(function() {
            $('#flash-message').fadeOut('fast');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>