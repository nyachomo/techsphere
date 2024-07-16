@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Referee</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Referee</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->



<!--second section-->
<section class="content">
    <div class="container-fliud">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <!--modal-->
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                        
                         <i class="las la-plus"></i> Add Referee
                        </button>

                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered table-sm">
                          <thead>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Phonenumber</th>
                            <th>Email Address</th>
                            <th>Organisation</th>
                            <th>Position</th>
                            <th>Years Knowing referee</th>
                           
                          </thead>
                          <tbody>
                            @if(!empty($referees))
                              @foreach($referees as $referee)
                              <tr>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">Action</button>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item"  data-toggle="modal" data-target="#modalupdate{{$referee->id}}">
                                              <i class="las la-user-edit"></i>Update
                                               
                                            </a>
                                            <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaldelete{{$referee->id}}">
                                                    <i class="las la-user-minus"></i> Delete
                                                </a>
                                           
                                        </div>
                                        </button>
                                    </div>

                                </td>

                                <td>{{$referee->referee_name}}</td>
                                <td>{{$referee->referee_phone}}</td>
                                <td>{{$referee->referee_email}}</td>
                                <td>{{$referee->referee_organisation}}</td>
                                <td>{{$referee->referee_position}}</td>
                                <td>{{$referee->years_knowing_referee}}</td>


                                    <!--section for modal-->
                                    <div class="modal fade " id="modalupdate{{$referee->id}}">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                <i class="las la-plus"></i>
                                                    Add New Referee
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('student.updateReferee')}}">
                                                @csrf
                                                <div class="modal-body">
                                                <!--row1-->
                                                <div class="row">
                                                    <input type="text" name="id" class="form-control" value="{{$referee->id}}">
                                                    <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                                                    <div class="col-sm-6">
                                                        <div class="for-group">
                                                            <label>Fullname</label>
                                                            <input type="text" name="referee_name" value="{{$referee->referee_name}}" class="form-control @error('referee_name') is-invalid @enderror" name="referee_name" value="{{ old('referee_name') }}"  autocomplete="referee_name" autofocus>
                                                            @error('referee_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="for-group">
                                                            <label>Phonenumber</label>
                                                            <input type="number" name="referee_phone" value="{{$referee->referee_phone}}"  class="form-control @error('referee_phone') is-invalid @enderror"  value="{{ old('referee_phone') }}"  autocomplete="referee_phone" autofocus>
                                                            @error('referee_phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    

                                                </div>
                                                <!--endrow1-->

                                                <!--secondrow-->
                                                <div class="row">
                                                        <div class="col-sm-6">
                                                                <div class="for-group">
                                                                    <label>Email Address</label>
                                                                    <input type="text" name="referee_email" value="{{$referee->referee_email}}" class="form-control @error('referee_email') is-invalid @enderror"  value="{{ old('referee_email') }}"  autocomplete="referee_email" autofocus>
                                                                    @error('referee_email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="for-group">
                                                                <label>Organisation</label>
                                                                <input type="text" name="referee_organisation" value="{{$referee->referee_organisation}}" class="form-control @error('referee_organisation') is-invalid @enderror"  value="{{ old('referee_organisation') }}"  autocomplete="referee_organisation" autofocus>
                                                                    @error('referee_organisation')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>


                                                </div>
                                                <!--endsecond row-->

                                                <!--row1-->
                                                <div class="row">
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="for-group">
                                                            <label>Position</label>
                                                            <input type="text" name="referee_position" value="{{$referee->referee_position}}" class="form-control @error('referee_position') is-invalid @enderror"  value="{{ old('referee_position') }}"  autocomplete="referee_position" autofocus>
                                                            @error('referee_position')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="for-group">
                                                            <label>How long have you know the referee</label>
                                                            <input type="number" name="years_knowing_referee" value="{{$referee->years_knowing_referee}}"  min="1" class="form-control @error('years_knowing_referee') is-invalid @enderror"  value="{{ old('years_knowing_referee') }}"  autocomplete="years_knowing_referee" autofocus>
                                                            @error('years_knowing_referee')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--endrow1-->



                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update changes</button>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    
                                    <!--delete btn-->
                                    <div class="modal fade " id="modaldelete{{$referee->id}}">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> Are you sure you want do delete this record ?</h6>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <form method="post" action="{{route('student.deleteReferee')}}">
                                                @csrf
                                                
                                                <input type="text" name="id" class="form-control" value="{{$referee->id}}" hidden="true">
                                                    
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!--delete btn-->






                                
                              </tr>
                              @endforeach
                              @else
                              <p style="color:red;">No record</p>
                            @endif
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!--endSecond section-->

<!--section for modal-->
<div class="modal fade " id="modal-default">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
               <i class="las la-plus"></i>
                Add New Referee
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('student.addReferee')}}">
            @csrf
            <div class="modal-body">
               <!--row1-->
               <div class="row">
                 <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Fullname</label>
                        <input type="text" name="referee_name" class="form-control @error('referee_name') is-invalid @enderror" name="referee_name" value="{{ old('referee_name') }}"  autocomplete="referee_name" autofocus>
                        @error('referee_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Phonenumber</label>
                        <input type="number" name="referee_phone"  class="form-control @error('referee_phone') is-invalid @enderror"  value="{{ old('referee_phone') }}"  autocomplete="referee_phone" autofocus>
                        @error('referee_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>

                  

               </div>
               <!--endrow1-->

               <!--secondrow-->
               <div class="row">
                    <div class="col-sm-6">
                            <div class="for-group">
                                <label>Email Address</label>
                                <input type="text" name="referee_email"  class="form-control @error('referee_email') is-invalid @enderror"  value="{{ old('referee_email') }}"  autocomplete="referee_email" autofocus>
                                @error('referee_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="for-group">
                            <label>Organisation</label>
                            <input type="text" name="referee_organisation"  class="form-control @error('referee_organisation') is-invalid @enderror"  value="{{ old('referee_organisation') }}"  autocomplete="referee_organisation" autofocus>
                                @error('referee_organisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>


               </div>
               <!--endsecond row-->

               <!--row1-->
               <div class="row">
                  
                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Position</label>
                        <input type="text" name="referee_position"  class="form-control @error('referee_position') is-invalid @enderror"  value="{{ old('referee_position') }}"  autocomplete="referee_position" autofocus>
                        @error('referee_position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>How long have you know the referee</label>
                        <input type="number" name="years_knowing_referee"  min="1" class="form-control @error('years_knowing_referee') is-invalid @enderror"  value="{{ old('years_knowing_referee') }}"  autocomplete="years_knowing_referee" autofocus>
                        @error('years_knowing_referee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>

               </div>
               <!--endrow1-->



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--end of modalad-->

@if ($errors->any())
    <div id="flash-message" class="alert alert-danger alert-dismissible position-fixed" style="top: 40px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Faile. Please check the form  for errors
    </div>
@endif

@if ($message = Session::get('success'))
    <div id="flash-message" class="alert alert-success alert-dismissible position-fixed" style="top: 20px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('Update'))
    <div id="flash-message" class="alert alert-success alert-dismissible position-fixed" style="top: 20px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('Delete'))
    <div id="flash-message" class="alert alert-success alert-dismissible position-fixed" style="top: 20px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ $message }}</strong>
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