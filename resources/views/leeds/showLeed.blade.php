@extends('layouts.master')
@section('content')
<section class="content">
    <div class="container-fliud">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                            <div class="btn-group">
                                <button class="btn btn-sm orange" style="float:right" data-toggle="modal" data-target="#addLeddModal"><i class="las la-plus las1"></i>ADD NEW LEED</button>
                            </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                                <th>ACTION</th>
                                <th>STUDENT FULLNAME</th>
                                <th>STUDENT EMAIL</th>
                                <th>STUDENT PHONE</th>
                                <th>STUDENT GENDER</th>
                                <th>STUDENT SCHOOL</th>
                                <th>STUDENT FORM</th>
                                <th>COMMENTS</th>
                            </thead>
                            <tbody>
                                @if($leeds->count()>0)
                                   @foreach($leeds as $leed)
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
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#update_leed{{$leed->id}}">
                                                    <i class="las la-edit las1"></i> UPDATE ACHIEVEMENT(S)
                                                    
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#viewMoreInfor_leed{{$leed->id}}">
                                                        <i class="las la-eye las3"></i> VIEW MORE INFORMATION
                                                    </a>
                                                
                                                </div>
                                                </button>
                                            </div>
                                        </td>
                                        <!--end action-->

                                         <td>{{$leed->student_fullname}}</td>
                                         <td>{{$leed->student_email}}</td>
                                         <td>{{$leed->student_phone}}</td>
                                         <td>{{$leed->student_gender}}</td>
                                         <td>{{$leed->student_school}}</td>
                                         <td>{{$leed->student_form}}</td>
                                         <td>{{$leed->student_form}}</td>
                                         
                                    </tr>

                                    <!--update leed-->
                                    <div class="modal fade" id="update_leed{{$leed->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">UPDATE LEED</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('updateLeed')}}">
                                                    @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <input type="text" name="id" value="{{$leed->id}}" hidden="true">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>STUDENT FULLNAME <sup>*</sup></label>
                                                                    <input type="text"  name="student_fullname"  class="form-control @error('student_fullname') is-invalid @enderror"  value="{{$leed->student_fullname }}" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>STUDENT EMAIL</label>
                                                                    <input type="email" class="form-control"  name="student_email" class="form-control @error('student_email') is-invalid @enderror"  value="{{$leed->student_email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>STUDENT PHONENUMBER <sup>*</sup></label>
                                                                    <input type="number" class="form-control" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror"  value="{{$leed->student_phone }}"  required>
                                                                    @error('student_phone')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>STUDENT GENDER</label>
                                                                    <select class="form-control" name="student_gender" name="student_gender" class="form-control @error('student_gender') is-invalid @enderror"  value="{{$leed->student_gender}}">
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



                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>STUDENT SCHOOL</label>
                                                                    <input type="text" class="form-control" name="student_school" value="{{$leed->student_school}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>STUDENT FORM</label>
                                                                    <select class="form-control" name="student_form">
                                                                        <option value="{{$leed->student_form}}">{{$leed->student_form}}</option>
                                                                        <option VALUE="TWO">TWO</option>
                                                                        <option VALUE="THREE">THREE</option>
                                                                        <option VALUE="FOUR">FOUR</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>PARENT FULLNAME</label>
                                                                    <input type="text" class="form-control" name="parent_name" value="{{$leed->parent_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>PARENT PHONENUMBER</label>
                                                                    <input type="text" class="form-control" name="parent_phone" value="{{$leed->parent_phone}}">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>PARENT EMAIL</label>
                                                                    <input type="email" class="form-control" name="parent_email" value="{{$leed->parent_email}}" >
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>STUDENT RESIDENCE</label>
                                                                    <input type="text" class="form-control" name="student_location" value="{{$leed->parent_location}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- textarea -->
                                                                <div class="form-group">
                                                                    <label>COMMENT</label>
                                                                    <textarea class="form-control" rows="3" name="comment">{{$leed->comment}}</textarea>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        <!-- input states -->
                                                        
                                                
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
                                    </div>
                                    <!--end update leed-->
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

<!--add modal-->
<!--update profile image-->
<div class="modal fade" id="addLeddModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW LEED</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('addLeed')}}">
            @csrf
        <!-- /.card-header -->
        <div class="card-body">
                <div class="row">
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>STUDENT EMAIL</label>
                            <input type="email" class="form-control"  name="student_email" class="form-control @error('student_email') is-invalid @enderror"  value="{{ old('student_email') }}">
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
                        <!-- textarea -->
                        <div class="form-group">
                            <label>STUDENT PHONENUMBER <sup>*</sup></label>
                            <input type="number" class="form-control" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror"  value="{{ old('student_phone') }}"  required>
                            @error('student_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>STUDENT GENDER</label>
                            <select class="form-control" name="student_gender" name="student_gender" class="form-control @error('student_gender') is-invalid @enderror"  value="{{ old('student_gender') }}">
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



                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>STUDENT SCHOOL</label>
                            <input type="text" class="form-control" name="student_school">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>STUDENT FORM</label>
                            <select class="form-control" name="student_form">
                                <option value="ONE">ONE</option>
                                <option VALUE="TWO">TWO</option>
                                <option VALUE="THREE">THREE</option>
                                <option VALUE="FOUR">FOUR</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>PARENT FULLNAME</label>
                            <input type="text" class="form-control" name="parent_name" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>PARENT PHONENUMBER</label>
                            <input type="text" class="form-control" name="parent_phone" >
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>PARENT EMAIL</label>
                            <input type="email" class="form-control" name="parent_email" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>STUDENT RESIDENCE</label>
                            <input type="text" class="form-control" name="student_location" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>COMMENT</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                      </div>
                    </div>
                </div>



                <!-- input states -->
                
           
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

<!--end add modal-->


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