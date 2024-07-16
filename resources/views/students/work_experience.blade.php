@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Work Experience</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--section2-->
<section class="content">
     <div class="container-fliud">
        <div class="card">
            <div class="card-header">
                <h6>{{$works->count()}} Work Experience</h6>
                <button type="button" class="btn addButton btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#addWorkExperienceModal">
                <i class="las la-plus"></i> Add Work Experience
                </button>
            </div>
            <div class="card-body">
                    <table class="table table-stripped table-sm table-bordered table-sm" id="workExperience">
                       <!--thead-->
                       <thead>
                            <tr>
                                <th>ACTION</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>COMPANY</th>
                                <th>ROLES</th>
                                
                                <th>REASON FOR LEAVING</th>
                                <th>ACHIEVEMENTS</th>
                                
                            </tr>
                       </thead>
                        <tbody>
                              @if($works->count()>0)
                                @foreach($works as $work)
                                <tr>

                                            <!--action-->
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn addButton btn-success btn-sm">ACTION</button>
                                                    <button type="button" class="btn btn-success addButton btn-sm dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <center><h4><b>MORE ACTIONS</b></h4></center>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#achivementModal{{$work->id}}">
                                                           <i class="las la-plus las2"></i> ADD ACHIEVEMENTS
                                                        </a>

                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"  data-toggle="modal" data-target="#modalupdate{{$work->id}}">
                                                        <i class="las la-edit las1"></i> UPDATE WORK EXPERIENCE
                                                        
                                                        </a>
                                                        
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaldelete{{$work->id}}">
                                                           <i class="las la-trash-alt las3"></i> DELETE WORK EXPERIENCE
                                                        </a>
                                                    
                                                    </div>
                                                    </button>
                                                </div>
                                            </td>
                                            <!--end action-->


                                            <td>{{$work->start_date}}</td>
                                            <td>{{$work->end_date}}</td>
                                            <td>{{$work->company}}</td>
                                            <td>{{$work->role}}</td>
                                         
                                            <td>{{$work->reason_for_leaving}}</td>

                                            <td>
                                                @if ($work->achievements->count() > 0)
                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#achievementsModal{{$work->id }}">
                                                       {{$work->achievements->count() }} Achievement(s)
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="achievementsModal{{$work->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="achievementsModalLabel{{ $work->id }}"> <i class="las la-graduation-cap las1"></i> Achievements In  {{ $work->company }}</h5>
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
                                                                            @foreach ($work->achievements as $key => $achievement)
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
                                                                                    <td>{{ $achievement->student_work_achivement}}</td>
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

                                                                                            <form method="post" action="{{route('student.updateWorkAchivement')}}">
                                                                                                @csrf
                                                                                                <div class="row">
                                                                                                    <input type="text" class="form-control" name="id" value="{{$achievement->id}}">
                                                                                                     <label>Achivement</label>
                                                                                                    <input type="text" name="student_work_achivement" class="form-control" value="{{$achievement->student_work_achivement}}">
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

                                                                                            <form method="post" action="{{route('student.deleteWorkAchivement')}}">
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

                                <!--modal for add data-->
                                    <div class="modal fade" id="modalupdate{{$work->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h6>
                                                    <i class="las la-plus"></i> Update Work Experience
                                                </h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <form method="post" action="{{route('student.updateWorkExperience')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="text" class="form-control" name="work_id" value="{{$work->id}}">
                                                        <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input type="text" name="start_date" class="form-control" value="{{$work->start_date}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <input type="text" name="end_date" class="form-control" value="{{$work->end_date}}" required>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                    <label>Company</label>
                                                                    <input type="text" name="company" class="form-control" value="{{$work->company}}" required>
                                                                   
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                    <label>Position</label>
                                                                    <input type="text" class="form-control" value="{{$work->role}}" name="role" required>
                                                                    @error('role')
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
                                                                    <label>Achivements</label>
                                                                    <input type="text"  name="achivement" class="form-control" value="{{$work->role}}" required>
                                                                        
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                            <label>Reason For Leaving</label>
                                                            <textarea  name="reason_for_leaving" class="form-control">{{$work->reason_for_leaving}}</textarea>
                                                            

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                    <button type="submit" class="btn addButton btn-success"><i class="las la-edit"></i>Update</button>
                                                </div>
                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                <!--end modal for add data-->


                                 <!--modal for add data-->
                                  <div class="modal fade" id="achivementModal{{$work->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h6>
                                                 <i class="las la-plus las1"></i>
                                                    Add Achievement
                                                </h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <form method="post" action="{{route('student.addWorkAchivement')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="text" class="form-control" name="work_id" value="{{$work->id}}" hidden="true">
                                                        <label>Achievements<lebal>
                                                        <input type="text" class="form-control" name="student_work_achivement" required>
                                                        
                                                    </div>

                                                    


                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                    <button type="submit" class="btn addButton btn-success"><i class="las la-plus"></i>Add</button>
                                                </div>
                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                <!--end modal for add data-->

                                <!--modal for add data-->
                                <div class="modal fade" id="modaldelete{{$work->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h6>
                                                   Are you sure you want to delete this record
                                                </h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <form method="post" action="{{route('student.deleteWorkExperience')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="text" class="form-control" name="work_id" value="{{$work->id}}">
                                                        
                                                    </div>

                                                    


                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                    <button type="submit" class="btn addButton btn-success"><i class="las la-trash"></i>Delete</button>
                                                </div>
                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                <!--end modal for add data-->

                                @endforeach
                              @else
                              @endif
                        </tbody>
                    </table>

            </div>
            <div class="card-footer"></div>
        </div>
     </div>
</section>
<!--endsection2-->

<!--modal for add data-->

<div class="modal fade" id="addWorkExperienceModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h6>
                   <i class="las la-plus"></i> Add Work Experience
               </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form method="post" action="{{route('student.addWorkExperience')}}">
                @csrf
                <div class="row">
                    <input type="text" class="form-control" name="student_id" value="{{$student->id}}">
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
                                <label>Company</label>
                                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror"  value="{{ old('company') }}"  autocomplete="company">
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror"  value="{{ old('role') }}"  autocomplete="role" autofocus  name="role">
                                @error('role')
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
                                <label>Achivements</label>
                                <input type="text"  name="achivement" class="form-control @error('achivement') is-invalid @enderror"  value="{{ old('achivement') }}"  autocomplete="achivement" autofocus>
                                    @error('achivement')
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
                        <label>Reason For Leaving</label>
                           <textarea  name="reason_for_leaving" class="form-control @error('reason_for_leaving') is-invalid @enderror"  value="{{ old('reason_for_leaving') }}"  autocomplete="reason_for_leaving" autofocus ></textarea>
                           @error('reason_for_leaving')
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
<!--end modal for add data-->

<!--error-->
@if ($errors->any())
    <div id="flash-message" class="alert alert-danger alert-dismissible position-fixed" style="top: 40px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Faile. Please check the form  for errors
    </div>
@endif
<!--end errors-->
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
