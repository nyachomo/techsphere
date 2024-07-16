@extends('layouts.master')
@section('content')


<!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PROFILE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">STUDENT PROFILE</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
<!--container-fluid -->

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!--first row-->
        <div class="row">
            <div class="col-md-5">

              <!-- Profile Image -->
              <div class="card">
                <div class="card-header">

                      <div class="btn-group">
                          <button class="btn btn-sm orange" style="float:right" data-toggle="modal" data-target="#updateprofileimage"><i class="las la-edit las1"></i>UPDATE PROFILE IMAGE</button>
                          <button class="btn btn-sm darkBlue" style="float:left" data-toggle="modal" data-target="#updatepassword"><i class="las la-edit las2"></i>UPDATE PASSWORD</button> 
                          <button class="btn btn-sm  lightColor" style="float:left" data-toggle="modal" data-target="#updatepersonalinfo"><i class="las la-edit las3"></i>UPDATE PERSONAL INFO</button>       
                      </div>
                </div>
                <div class="card-body box-profile">
                  <div class="text-center">
                    
                    <img class="profile-user-img img-fluid img-circle"src="{{asset('uploads/user_profile/'.$student->profile_image)}}">  
                  </div>

                  <h3 class="profile-username text-center">{{$student->name}}</h3>

                  

                  <table class="table table-striped">
                    <tr>
                        <td>Fullname</td>
                        <td>{{$student->name}}</td>
                    </tr>

                    <tr>
                        <td>Phonenumber</td>
                        <td>{{$student->phone}}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{$student->email}}</td>
                    </tr>

                    <tr>
                        <td>Course</td>
                        <td>{{$course->name}}</td>
                    </tr>

                  </table>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              
            </div>

           

             <div class="col-sm-7">
                 <div class="card">
                    <div class="card-header">
                     
                        SKILLS
                        <button class="btn btn-sm darkBlue" style="float:right" data-toggle="modal" data-target="#addSkill"><i class="las la-plus"></i>Add SKILLS</button>
                     

                    </div>
                    <div class="card-body">
                         <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                                 <th>ACTION</th>
                                 <th>SKILLS</th>
                            </thead>
                            <tbody>
                               @if(!empty($skills))
                                   @foreach($skills as $skill)
                                     <tr>
                                          <!--action-->
                                          <td>
                                              <div class="btn-group">
                                                  <button type="button" class="btn btn-success btn-sm lightColor">ACTION</button>
                                                  <button type="button" class="btn btn-success lightColor btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                  <div class="dropdown-menu" role="menu">
                                                    <center><h6><b>MORE ACTION</b></h6></center>
                                                      <a class="dropdown-item"  data-toggle="modal" data-target="#updateSkill{{$skill->id}}">
                                                      <i class="las la-edit las1"></i>UPDATE SKILL
                                                        
                                                      </a>
                                                      <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteSkill{{$skill->id}}">
                                                          <i class="las la-trash las2"></i> DELETE SKILL
                                                          </a>
                                                    
                                                  </div>
                                                  </button>
                                              </div>

                                          </td>
                                          <!--end action-->
                                          <td>{{$skill->student_skills}}</td>
                                     </tr>

                                     <!--student skills-->
                                      <div class="modal fade" id="updateSkill{{$skill->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h6 class="modal-title">
                                                 <i class="fa fa-edit las1"></i> UPDATE SKILL
                                              </h6>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form method="post" action="{{route('studentUpdateSkill')}}">
                                              @csrf
                                              <div class="modal-body">
                                                <input type="text" name="id" value="{{$skill->id}}" class="form-control" hidden="true">
                                                <label>UPDATE SKILLS</label>
                                                <input type="text" class="form-control" name="student_skills" required value="{{$skill->student_skills}}">
                                              </div>
                                              <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>UPDATE</button>
                                              </div>
                                            </form>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
                                      <!--studentskills-->

                                      <!--student skills-->
                                      <div class="modal fade" id="deleteSkill{{$skill->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h6 class="modal-title">
                                              ARE YOUR YOU WANT TO DELETE THIS RECORD
                                              </h6>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form method="post" action="{{route('studentDeleteSkill')}}">
                                              @csrf
                                              <div class="modal-body">
                                                <input type="text" name="id" value="{{$skill->id}}" class="form-control" hidden="true">
                                                
                                              </div>
                                              <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                <button type="submit" class="btn btn-danger"> <i class="las la-trash"></i> DELETE </button>
                                              </div>
                                            </form>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
                                      <!--studentskills-->


                                   @endforeach
                               @endif
                            </tbody>
                          </table>
                    </div>
                 </div>
             </div>




          
          
          
        </div>
      </div>
      <!--second-row-->
    </section>

    <section class="content">
       <div class="container-fliud">
         <div class="row">
            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                      <h6>Profesional Summary</h6>
                        <div class="btn-group" style="float:right;">
                          @if(!empty($professionalSummary))
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#updateProSummary{{$professionalSummary->id}}"><i class="las la-edit"></i>UPDATE</button>
                              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProSummary{{$professionalSummary->id}}"><i class="las la-trash"></i>DELETE</button>
                          @else
                              <button class="btn btn-sm darkBlue" data-toggle="modal" data-target="#modal-default"><i class="las la-plus"></i>ADD</button>
                          @endif
                        </div>
                    </div>
                    <div class="card-body">
                      @if(!empty($professionalSummary))
                       
                        
                         <p>{{$professionalSummary->professional_summary}}</p>

                            <!--profession summary modal-->
                            <div class="modal fade" id="updateProSummary{{$professionalSummary->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h6 class="modal-title">
                                     UPDATE PROFESIONAL SUMMARY
                                    </h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" action="{{route('updateStudentProfessionalSummary')}}">
                                    @csrf
                                    <div class="modal-body">
                                      <input type="text" name="id" value="{{$professionalSummary->id}}" class="form-control" hidden="true">
                                      <label>PROFESSIONAL SUMMARY</label>
                                      <textarea class="form-control" name="professional_summary" required>{{$professionalSummary->professional_summary}}</textarea>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                      <button type="submit" class="btn btn-success"> <i class="las la-edit"></i> UPDATE</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!--end of professional summary modal-->


                            <!--profession summary modal-->
                            <div class="modal fade" id="deleteProSummary{{$professionalSummary->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h6 class="modal-title">
                                    ARE YOU SURE YOU WANT TO DELETE THIS RECORD ?
                                    </h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" action="{{route('deleteStudentProfessionalSummary')}}">
                                    @csrf
                                    <div class="modal-body">
                                      <input type="text" name="id" value="{{$professionalSummary->id}}" class="form-control" hidden="true">
                                      
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                      <button type="submit" class="btn btn-danger"> <i class="las la-trash"></i> DELETE</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!--end of professional summary modal-->

                      @else
                         <p style="color:red">No Record</p>
                      @endif
                     
                      
                    </div>
                </div>
             </div>


             
         </div>
       </div>
    </section>

<!--profession summary modal-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
         ADD PROFESSIONAL SUMMARY
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('addStudentProfessionalSummary')}}">
        @csrf
        <div class="modal-body">
          <input type="text" name="student_id" value="{{$student->id}}" class="form-control">
          <label>PROFESSIONAL SUMMARY</label>
          <textarea class="form-control" name="professional_summary" required></textarea>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>ADD</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end of professional summary modal-->

<!--student skills-->
<div class="modal fade" id="addSkill">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
        <i class="las la-plus"></i> ADD SKILL
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('studentAddSkill')}}">
        @csrf
        <div class="modal-body">
          <input type="text" name="student_id" value="{{$student->id}}" class="form-control" hidden="true">
          <label>ADD SKILL</label>
          <input type="text" class="form-control" name="student_skills" required>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>ADD</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->


<!--update profile image-->
<div class="modal fade" id="updateprofileimage">
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
<!--studentskills-->

<!--update profile image-->
<div class="modal fade" id="updatepassword">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
           UPDATE PASSWORD
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          

            <form role="form" method="POST" action="{{route('student.updatepassword')}}">
            @csrf
              <div class="row">

                <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                <input type="" class="form-control" value="{{$student->phone}}" name="old_phone" hidden="true">
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>NEW PASSWORD</label>
                    <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                </div>

                <div class="col-sm-6" style="padding-top:30px;">
                  <button type="submit" class="btn btn-success" style="width:100%"><i class="las la-edit las3"></i>UPDATE</button>
                </div>


                

              </div>
            
            </form>

        </div>

        <div class="modal-footer justify-content-between">
          
           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          
        </div>
       
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

<!--update profile image-->
<div class="modal fade" id="updatepersonalinfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
         Update personal Information
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          

                 <form role="form" method="POST" action="{{route('student.updateprofile')}}">
                    @csrf
                      <div class="row">

                        <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                        <input type="" class="form-control" value="{{$student->phone}}" name="old_phone" hidden="true">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="name" value="{{$student->name}}" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Phonenumber [2547xxx]</label>
                            <input type="number" value="{{$student->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">

                          <label>Email</label>
                          <input type="email" value="{{$student->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror


                        </div>
                        <div class="col-sm-6" style="padding-top:30px;">
                          <button type="submit" class="btn btn-success" style="width:100%">Update</button>
                        </div>
                      </div>
                  </form>


        </div>

        <div class="modal-footer justify-content-between">
          
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
          
        </div>
       
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

@endsection