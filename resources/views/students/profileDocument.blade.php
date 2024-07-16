@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Documents</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Documents</li>
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
                        
                         <i class="las la-plus"></i> Add New Document
                        </button>

                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered table-sm">
                          <thead>
                            <th>Action</th>
                            <th>Document Name</th>
                            <th>Document Type</th>
                            <th>File</th>
                          </thead>
                          <tbody>
                            @if(!empty($documents))
                              @foreach($documents as $document)
                              <tr>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">Action</button>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item"  data-toggle="modal" data-target="#modalupdate{{$document->id}}">
                                              <i class="las la-user-edit"></i>Update
                                               
                                            </a>
                                            <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaldelete{{$document->id}}">
                                                    <i class="las la-user-minus"></i> Delete
                                                </a>
                                           
                                        </div>
                                        </button>
                                    </div>

                                </td>

                                <td>{{$document->document_type}}</td>
                                <td>{{$document->document_name}}</td>
                                <td>{{$document->document_file}}</td>


                                    <!--section for modal-->
                                    <div class="modal fade " id="modalupdate{{$document->id}}">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                <i class="las la-plus"></i>
                                                    Update Document
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('updateStudentProfileDocument')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">

                                                 <!--modal-body-content-->

                                                 <!--row1-->
                                                    <div class="row">
                                                        <input type="text" name="id" class="form-control" value="{{$document->id}}" hidden="true">
                                                        <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                                                        <div class="col-sm-6">
                                                            <div class="for-group">
                                                                <label>Document Type</label>
                                                                <select name="document_type"  class="form-control @error('document_type') is-invalid @enderror"  value="{{ old('document_type') }}"  autocomplete="document_type" autofocus>
                                                                    <option value="{{$document->document_type}}">{{$document->document_type}}</option>
                                                                    <option value="Academic">Academic</option>
                                                                    <option value="Cv">Cv</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                                @error('document_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                                    <div class="for-group">
                                                                        <label>Document Name</label>
                                                                        <input type="text" name="document_name" value="{{$document->document_name}}"  class="form-control @error('document_name') is-invalid @enderror"  value="{{ old('document_name') }}"  autocomplete="document_name" autofocus>
                                                                        
                                                                        @error('document_name')
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
                                                            

                                                            <div class="col-sm-12">
                                                                <div class="for-group">
                                                                    <label>Document File</label>
                                                                    <input type="file" name="document_file"  class="form-control @error('document_file') is-invalid @enderror"  value="{{ old('document_file') }}"  autocomplete="document_file" autofocus>
                                                                        @error('document_file')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                </div>
                                                            </div>


                                                    </div>
                                                    <!--endsecond row-->

                                                 <!---end of modal-body-content-->
                                               

                                                

                                               



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
                                    <div class="modal fade " id="modaldelete{{$document->id}}">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> Are you sure you want do delete this record ?</h6>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <form method="post" action="{{route('deleteStudentProfileDocument')}}">
                                                @csrf
                                                
                                                <input type="text" name="id" class="form-control" value="{{$document->id}}" hidden="true">
                                                    
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
                Add New Document
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('addStudentProfileDocument')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

               <!--row1-->
               <div class="row">
                 <input type="text" name="student_id" class="form-control" value="{{$student_id}}" hidden="true">
                  <div class="col-sm-6">
                     <div class="for-group">
                        <label>Document Type</label>
                        <select name="document_type"  class="form-control @error('document_type') is-invalid @enderror"  value="{{ old('document_type') }}"  autocomplete="document_type" autofocus>
                            <option value="None">None</option>
                            <option value="Academic">Academic</option>
                            <option value="Cv">Cv</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                     </div>
                  </div>

                  <div class="col-sm-6">
                            <div class="for-group">
                                <label>Document Name</label>
                                <input type="text" name="document_name"  class="form-control @error('document_name') is-invalid @enderror"  value="{{ old('document_name') }}"  autocomplete="document_name" autofocus>
                                @error('document_name')
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
                    

                    <div class="col-sm-12">
                        <div class="for-group">
                            <label>Document File</label>
                            <input type="file" name="document_file"  class="form-control @error('document_file') is-invalid @enderror"  value="{{ old('document_file') }}"  autocomplete="document_file" autofocus>
                                @error('document_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>


               </div>
               <!--endsecond row-->




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


@endsection