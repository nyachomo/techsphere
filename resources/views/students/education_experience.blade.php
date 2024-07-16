@extends('layouts.master')
@section('content')
<?php
 use App\Models\StudentEducationAchivement;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Education Experience</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>


<!--section-->
<section class="content">
    <div class="container-fliud">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{$educations->count()}} Education Experience
                        <button type="button" class="btn addButton btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addEducationExperienceModal">
                        <i class="las la-plus"></i> Add Education
                        </button>
                    </div>
                    <div class="card-body">

                            <table  id="educationExperience" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Institution</th>
                                        <th>Course</th>
                                        <th>Grade</th>
                                        <th>Achivements</th>
                                     
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($educations))
                                       @foreach($educations as $education)
                                         <tr>
                                            <!--action-->
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn addButton btn-success btn-sm">Action</button>
                                                    <button type="button" class="btn btn-success addButton btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <center><h4><b>MORE ACTIONS</b></h4></center>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"  data-toggle="modal" data-target="#modalupdate{{$education->id}}">
                                                        <i class="las la-edit las1"></i> UPDATE EDUCATION EXPERIENCE
                                                        
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#achivementModal{{$education->id}}">
                                                           <i class="las la-plus las2"></i> ADD ACHIEVEMENTS
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaldelete{{$education->id}}">
                                                           <i class="las la-trash-alt las3"></i> DELETE EDUCATION EXPERIENCE
                                                        </a>
                                                    
                                                    </div>
                                                    </button>
                                                </div>
                                            </td>
                                            <!--end action-->

                                             <td>{{$education->start_date}}</td>
                                             <td>{{$education->end_date}}</td>
                                             <td>{{$education->school_attended}}</td>
                                             <td>{{$education->course_studied}}</td>
                                             <td>{{$education->grade_scored}}</td>
                                             <td>
                                                @if ($education->achievements->count() > 0)
                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#achievementsModal{{ $education->id }}">
                                                       {{ $education->achievements->count() }} Achievement(s)
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="achievementsModal{{ $education->id }}" tabindex="-1" role="dialog" aria-labelledby="achievementsModalLabel{{ $education->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="achievementsModalLabel{{ $education->id }}"> <i class="las la-graduation-cap las1"></i> Achievements In  {{ $education->school_attended }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-striped table-sm" id="educationAchievements">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Action</th>
                                                                              
                                                                                <th>Achievement</th>
                                                                               
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($education->achievements as $key => $achievement)
                                                                                <tr>
                                                                                    
                                                                                    <!--action-->
                                                                                    <td>
                                                                                        <div class="btn-group">
                                                                                            <button type="button" class="btn addButton btn-success btn-sm">Action</button>
                                                                                            <button type="button" class="btn btn-success addButton btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                                            <div class="dropdown-menu" role="menu">
                                                                                                <center><h4><b>MORE ACTIONS</b></h4></center>
                                                                                                <div class="dropdown-divider"></div>
                                                                                                <a class="dropdown-item"  data-toggle="modal" data-target="#update_achievement{{$achievement->id}}">
                                                                                                <i class="las la-edit las1"></i> UPDATE ACHIEVEMENT(S)
                                                                                                
                                                                                                </a>
                                                                                                <div class="dropdown-divider"></div>
                                                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_achievement{{$achievement->id}}">
                                                                                                   <i class="las la-trash-alt las3"></i> DELETE ACHIVEMENT(S)
                                                                                                </a>
                                                                                            
                                                                                            </div>
                                                                                            </button>
                                                                                        </div>
                                                                                    </td>
                                                                                    <!--end action-->
                                                                                    <td>{{ $achievement->student_education_achivement}}</td>
                                                                                </tr>


                                                                                <!--end update-->
                                                                                <div class="modal fade" id="update_achievement{{$achievement->id}}" style="z-index:200">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h6>Update Achievement</h6>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">

                                                                                            <form method="post" action="{{route('updateAchivement')}}">
                                                                                                @csrf
                                                                                                <div class="row">
                                                                                                    <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                                                                    <label>Achivement</label>
                                                                                                
                                                                                                    <input type="text" name="student_education_achivement" class="form-control" value="{{$achievement->student_education_achivement}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer justify-content-between">
                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                <button type="submit" class="btn btn-success addButton">
                                                                                                    <i class="las la-edit las1"></i>
                                                                                                      Update
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--delete--data-->

                                                                                 <!--end update-->
                                                                                 <div class="modal fade" id="delete_achievement{{$achievement->id}}" style="z-index:300">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h6>Are you sure you want to delete this record ?</h6>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">

                                                                                            <form method="post" action="{{route('deleteAchivement')}}">
                                                                                                @csrf
                                                                                                <div class="row">
                                                                                                    <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer justify-content-between">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                <button type="submit" class="btn btn-danger">
                                                                                                    <i class="las la-trash las3"></i>
                                                                                                    Delete
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--delete--data-->



                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <!--modal-footer-->

                                                                     <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                      
                                                                    </div>

                                                                <!--end modal-footer-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <button class="btn btn-xs btn-warning">0 Achievement(s)</button>
                                                @endif
                                            </td>

                                            
                                         </tr>

                                         <!--update-->

                                            <div class="modal fade" id="modalupdate{{$education->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"></div>
                                                        <div class="modal-body">

                                                        <form method="post" action="{{route('student.updateEducationExperience')}}">
                                                            @csrf
                                                            <div class="row">
                                                                <input type="text" class="form-control" name="id" value="{{$education->id}}">
            
                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>From</label>
                                                                        <input type="text" name="start_date" value="{{$education->start_date}}" class="form-control @error('start_date') is-invalid @enderror"  value="{{ old('start_date') }}"  autocomplete="start_date" autofocus placeholder="eg 2006">
                                                                        @error('start_date')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>To</label>
                                                                        <input type="text" name="end_date" value="{{$education->end_date}}" class="form-control @error('end_date') is-invalid @enderror"  value="{{ old('end_date') }}"  autocomplete="end_date" autofocus placeholder="eg 2019">
                                                                        @error('end_date')
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
                                                                            <label>School Attended</label>
                                                                            <input type="text" name="school_attended" value="{{$education->school_attended}}" class="form-control @error('school_attended') is-invalid @enderror"  value="{{ old('school_attended') }}"  autocomplete="school_attended">
                                                                            @error('school_attended')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                            <label>Course Studied</label>
                                                                            <input type="text" value="{{$education->course_studied}}" class="form-control @error('course_studied') is-invalid @enderror"  value="{{ old('course_studied') }}"  autocomplete="course_studied" autofocus  name="course_studied">
                                                                            @error('course_studied')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                            <label>Grade Scored</label>
                                                                            <input type="text"  name="grade_scored" value="{{$education->grade_scored}}" class="form-control @error('grade_scored') is-invalid @enderror"  value="{{ old('grade_scored') }}"  autocomplete="grade_scored" autofocus>
                                                                                @error('grade_scored')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                    <label>Achievements</label>
                                                                    <textarea  name="achivement"  class="form-control @error('achivement') is-invalid @enderror"  value="{{ old('achivement') }}"  autocomplete="achivement" autofocus >{{$education->achivement}}</textarea>
                                                                    @error('achivement')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>

                                                    </div>
                                                </div>
                                            </div>

                                         <!--end update-->
                                             <div class="modal fade" id="modaldelete{{$education->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6>Are you sure you want to delete this record</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                        <form method="post" action="{{route('student.deleteEducationExperience')}}">
                                                            @csrf
                                                            <div class="row">
                                                                <input type="text" class="form-control" name="id" value="{{$education->id}}" hidden="true">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>

                                                    </div>
                                                </div>
                                            </div>
                                         <!--delete--data-->

                                         <!--end update-->
                                            <div class="modal fade" id="achivementModal{{$education->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6>Add Education Achievement</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                        <form method="post" action="{{route('addAchivement')}}">
                                                            @csrf
                                                            <div class="row">
                                                                <input type="text" class="form-control" name="education_id" value="{{$education->id}}">
                                                                <label>Education Achivement</label>
                                                             
                                                                <input type="text" name="student_education_achivement" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                            <button type="submit" class="btn btn-success addButton">
                                                                <i class="las la-edit"></i>
                                                                Add
                                                            </button>
                                                        </div>
                                                    </form>

                                                    </div>
                                                </div>
                                            </div>
                                         <!--delete--data-->

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
<!--end section--> 

<div class="modal fade" id="addEducationExperienceModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h6>
                   <i class="las la-plus"></i> Add Education Experience
               </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form method="post" action="{{route('student.addEducationExperience')}}">
                @csrf
                <div class="row">
                    <input type="text" class="form-control" name="student_id" value="{{$student->id}}" hidden="true">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror"  value="{{ old('start_date') }}"  autocomplete="start_date" autofocus placeholder="eg 2006">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                             <label>To</label>
                             <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror"  value="{{ old('end_date') }}"  autocomplete="end_date" autofocus placeholder="eg 2019">
                             @error('end_date')
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
                                <label>School Attended</label>
                                <input type="text" name="school_attended" class="form-control @error('school_attended') is-invalid @enderror"  value="{{ old('school_attended') }}"  autocomplete="school_attended">
                                @error('school_attended')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                                <label>Course Studied</label>
                                <input type="text" class="form-control @error('course_studied') is-invalid @enderror"  value="{{ old('course_studied') }}"  autocomplete="course_studied" autofocus  name="course_studied">
                                @error('course_studied')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                                <label>Grade Scored</label>
                                <input type="text"  name="grade_scored" class="form-control @error('grade_scored') is-invalid @enderror"  value="{{ old('grade_scored') }}"  autocomplete="grade_scored" autofocus>
                                    @error('grade_scored')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>Achievements</label>
                           <textarea  name="achivement" class="form-control @error('achivement') is-invalid @enderror"  value="{{ old('achivement') }}"  autocomplete="achivement" autofocus ></textarea>
                           @error('achivement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                <button type="submit" class="btn addButton btn-success"><i class="las la-plus"></i>Save</button>
            </div>
        </form>

        </div>
    </div>
</div>


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



