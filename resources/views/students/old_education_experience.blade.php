@extends('layouts.master')
@section('content')

<?php
use App\Models\Course;
use App\Models\Student;
$phone=Auth::user()->phone;
$student=Student::where('phone',$phone)->first();
$course=Course::where('id',$student->course_id)->first();
?>

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Potfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Potfolio</li>
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
                        Education Experience
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEducationExperienceModal">
                                Add Education Experience
                                </button>
                    </div>
                    <div class="card-body">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Institution</th>
                                    <th>Course</th>
                                    <th>Grade</th>
                                    <th>Achivement</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="table1"></tbody>
                                
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end section-->

 

<div class="modal fade test" id="addEducationExperienceModal">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Education Experience</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div class="errMsgContainer"></div>
       <!--form-->
         
        <form role="form" method="POST" action="" id="addEducationExperienceForm">
            <div class="row">
                <input type="text" name="id" value="{{$student->id}}" id="student_id" class="form-control">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                <label>From</label>
                <input type="text" class="form-control" placeholder="eg 2006" id="start_date">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <label>To</label>
                <input type="text" class="form-control" placeholder="eg 2019" id="end_date">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>School Attended</label>
                <input type="text" class="form-control" id="school_attended">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <label>Course Studied</label>
                <input type="text" class="form-control" id="course_studied">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                <label>Grade Scored</label>
                <input type="text" class="form-control" id="grade_scored">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                <label>Achievements</label>
                <textarea class="form-control" id="achivement"></textarea>
                </div>
            </div>
            
            </div>


            
        
        </form>

       <!--end of form-->

    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addEducationExperience">Save changes</button>
    </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<div class="modal fade " id="updateEducationExperienceModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Education Experience</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="errMsgContainer"></div>
        <!--form-->
            
            <form role="form" method="POST" action="" id="addEducationExperienceForm">
                <div class="row">
                    <input type="text"   id="edit_education_id" class="form-control">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                        <label>From</label>
                        <input type="text" class="form-control" placeholder="eg 2006" id="edit_start_date">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>To</label>
                        <input type="text" class="form-control" placeholder="eg 2019" id="edit_end_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>School Attended</label>
                        <input type="text" class="form-control" id="edit_school_attended">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Course Studied</label>
                        <input type="text" class="form-control" id="edit_course_studied">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>Grade Scored</label>
                        <input type="text" class="form-control" id="edit_grade_scored">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>Achievements</label>
                        <textarea class="form-control" id="edit_achivement"></textarea>
                        </div>
                    </div>
                </div>


                
            
            </form>

        <!--end of form-->

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updateEducationExperience">update</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--delete modal-->
<div class="modal fade " id="deleteEducationExperienceModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Are you sure you want to delete this record</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="errMsgContainer"></div>
        <!--form-->
            
            <form role="form" method="POST" action="" id="deleteEducationExperienceForm">
                <div class="row">
                    <input type="text"   id="delete_education_id" class="form-control">
                
            </form>

        <!--end of form-->

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="deleteEducationExperience">update</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--end of delete modal-->

@endsection
@section('scripts')
 <script>
    $(document).ready(function(){
        fetchEducationExperience();
      //Add education experience
      $('#addEducationExperience').on('click',function(e){
        e.preventDefault();
        $('.errMsgContainer').html("");
        //collect values
        let student_id=$('#student_id').val();
        let start_date=$('#start_date').val();
        let end_date=$('#end_date').val();
        let school_attended=$('#school_attended').val();
        let course_studied=$('#course_studied').val();
        let grade_scored=$('#grade_scored').val();
        let achivement=$('#achivement').val();
       
        //Send ajax request
        $.ajax({
            url:"{{route('student.addEducationExperience')}}",
            method:"POST",
            data:{student_id:student_id,start_date:start_date,end_date:end_date,school_attended:school_attended,course_studied:course_studied,grade_scored:grade_scored,achivement:achivement},
            success:function(response){
                if(response.status==200){
                    $('#addEducationExperienceForm')[0].reset();
                    $('.test').modal('hide');
                    //$('tbody').empty();
                    //fetchEducationExperience();
                  }
            },
            error:function(err){
                let error=err.responseJSON;
                 $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                 });
            },

        })
      })
      //end add education experience


      //FETCH DATA

       //fetching course
      
        function  fetchEducationExperience(){
             $.ajax({
              type:'GET',
              url:"/fetch-educationExperience",
              dataType:"json",
              success:function(response){
                $('tbody').html("")
                 $.each(response.data,function(key,item){
                  $('tbody').append(
                     ' <tr>\
                        <td>'+item.start_date+'</td>\
                        <td>'+item.end_date+'</td>\
                        <td>'+item.school_attended+'</td>\
                        <td>'+item.course_studied+'</td>\
                         <td>'+item.grade_scored+'</td>\
                          <td>'+item.achivement+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_educationBtn btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_educationBtn btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
                     });  
                
              }
             });
         }



      //END OF FETCH DATA

      //GET DATA TO BE EDITED
        //get data to be updated
        $(document).on('click','.edit_educationBtn',function(e){
           e.preventDefault();
           var education_id=$(this).val();
           $('#updateEducationExperienceModal').modal('show');
          
           //get ajax request
           $.ajax({
              type:"GET",
              url:"/edit-educationExperience/"+education_id,
              success:function(response){
                  //console.log(response);  
                  if(response.status==400)
                  {

                      $('#success_message').html("");
                      $('#success_message').addClass('alert alert-danger');
                      $('#success_message').text(response.message);
                  }
                  else
                  {
                      $('#edit_education_id').val(response.education.id);
                      $('#edit_start_date').val(response.education.start_date);
                      $('#edit_end_date').val(response.education.end_date);
                      $('#edit_school_attended').val(response.education.school_attended);
                      $('#edit_course_studied').val(response.education.course_studied);
                      $('#edit_grade_scored').val(response.education.grade_scored);
                      $('#edit_achivement').val(response.education.achivement);
                      
                  }
              }

            });
           //end of ajax request

           
        });
        //get data to be updated

      //END OF GET DATA TO BE EDITED

      //UPDATE EDUCATION EXPERIENCE
        //Add data
        $(document).on('click','#updateEducationExperience',function(e){
          e.preventDefault();
              $('.errMsgContainer').html("");

                //collect data
                let education_id=$('#edit_education_id').val();
                let start_date=$('#edit_start_date').val();
                let end_date=$('#edit_end_date').val();
                let school_attended=$('#edit_school_attended').val();
                let course_studied=$('#edit_course_studied').val();
                let grade_scored=$('#edit_grade_scored').val();
                let achivement=$('#edit_achivement').val();

                //send ajax request
                $.ajax({
                    url:"{{route('student.updateEducationExperience')}}",
                    method:"POST",
                    data:{education_id:education_id,start_date:start_date,end_date:end_date,school_attended:school_attended,course_studied:course_studied,grade_scored:grade_scored,achivement:achivement},
                    success:function(response){
                        if(response.status==200){
                            $('#updateEducationExperienceModal').modal('hide');
                            $('tbody').empty();
                            fetchEducationExperience();
                        }
                    },
                    error:function(err){
                        let error=err.responseJSON;
                        $.each(error.errors,function(index,value){
                            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    },

                })
                //end of ajax request

          
        });
       //end of update company
      //END UPDATE EDUCATION EXPERIENCE

       //GET DATA TO BE EDITED
        //get data to be updated
        $(document).on('click','.delete_educationBtn',function(e){
           e.preventDefault();
           var education_id=$(this).val();
           $('#deleteEducationExperienceModal').modal('show');
          
           //get ajax request
           $.ajax({
              type:"GET",
              url:"/edit-educationExperience/"+education_id,
              success:function(response){
                  //console.log(response);  
                  if(response.status==400)
                  {

                      $('#success_message').html("");
                      $('#success_message').addClass('alert alert-danger');
                      $('#success_message').text(response.message);
                  }
                  else
                  {
                      $('#delete_education_id').val(response.education.id);
                      
                  }
              }

            });
           //end of ajax request

           
        });
        //get data to be updated

      //END OF GET DATA TO BE EDITED

      //DELETE EDUCATION EXPERIENCE
        //Add data
        $(document).on('click','#deleteEducationExperience',function(e){
          e.preventDefault();
                //collect data
                let education_id=$('#delete_education_id').val();
                //send ajax request
                $.ajax({
                    url:"{{route('student.deleteEducationExperience')}}",
                    method:"POST",
                    data:{education_id:education_id},
                    success:function(response){
                        if(response.status==200){
                            $('#deleteEducationExperienceModal').modal('hide');
                            $('tbody').empty();
                            fetchEducationExperience();
                        }
                    },
                    error:function(err){
                        let error=err.responseJSON;
                        $.each(error.errors,function(index,value){
                            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    },

                })
                //end of ajax request

          
        });
       //end of update company
      //END DELETE EDUCATION EXPERIENCE




    })
 </script>
@endsection