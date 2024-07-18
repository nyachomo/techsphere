@extends('layouts.master')
@section('content')

<?php
use App\Models\Course;
use App\Models\Student;
$courses=Course::all();

// Retrieve unique course_ids from students table
$uniqueCourseIds = Student::distinct()->pluck('course_id');

// Retrieve courses corresponding to these unique course_ids
$enrolcourses = Course::whereIn('id', $uniqueCourseIds)->get();

?>
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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
        

          <div class="card">
            <div class="card-header">
               <p> <h1 class="stud_card card-title"></h1></p>

                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddStudentModal" style="float:right">
                  <i class="fa fa-plus"></i> Add new student
                </button>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddStudentModal" style="float:right">
                <i class="fa-solid fa-download"></i> Export as pdf
                </button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#AddStudentModal" style="float:right">
                <i class="fa-solid fa-download"></i> Export as excel
                  
                </button>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!--firstrow-->
              <div class="row">
                <div class="col-sm-1">Show:</div>
                <div class="col-sm-1">
                 
                   <select class="form-control" id="show">
                     <option value="">All</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="5">5</option>
                    </select> 
                

                </div>
                <div class="col-sm-1">
                  Search
                </div>
                <div class="col-sm-3">
                  <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here....">
                </div>
                <div class="col-sm-2">Filter By Course</div>
                <div class="col-sm-4">
                    <select class="course form-control" id="filter">
                          <option value="">All Courses</option>
                          @foreach($enrolcourses as $course)
                          <option value="{{$course->id}}">{{$course->name}}</option>
                          @endforeach
                        </select>

                </div>

              </div>
              <!--end of table-->
              <br>
             <!--end of first row-->

             <!--second row-->
               <div class="row">
                 <div class="col-sm-12">
                    
                  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody id="table1"></tbody>
                     
                      <tbody id="table2"></tbody>
                  </table>
                   

                 </div>
               </div>
             <!--end of second row-->

             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!--Add Student modal-->
            <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Add New Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                     <form method="post" action="">
                    <div class="modal-body">

                    

                     <ul id="saveform_errList">


                     </ul>

                     <div class="form-group mb-3">
                        <label for="">Student name</label>
                        <input type="text" class="name form-control">
                     </div>

                     <div class="form-group mb-3">
                        <label for="">Student Email</label>
                        <input type="text" class="email form-control">
                     </div>

                     <div class="form-group mb-3">
                        <label for="">Student phone</label>
                        <input type="text" class="phone form-control">
                     </div>

                     <div class="form-group mb-3">
                        <label for="">Course</label>
                        <select class="course_id form-control">
                          @foreach($courses as $course)
                          <option value="{{$course->id}}">{{$course->name}}</option>
                          @endforeach
                        </select>
                        
                     </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_student">Save changes</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
          <!--end of add student model-->

          <!--edit student model-->
          <div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title">Edit | Update Student</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">

                     

                      <ul id="updateform_errList">


                      </ul>
                       
                      <input type="text" id="edit_stud_id" hidden="true">
                      <div class="form-group mb-3">
                          <label for="">Student name</label>
                          <input type="text" id="edit_name" class="name form-control">
                      </div>

                      <div class="form-group mb-3">
                          <label for="">Student Email</label>
                          <input type="text" id="edit_email" class="email form-control">
                      </div>

                      <div class="form-group mb-3">
                          <label for="">Student phone</label>
                          <input type="text" id="edit_phone" class="phone form-control">
                      </div>

                      <div class="form-group mb-3">
                          <label for="">Course</label>
                         
                        <select class="form-control" >
                          <option value="" id="edit_course"></option>
                          @foreach($courses as $course)
                          <option value="{{$course->id}}">{{$course->name}}</option>
                          @endforeach
                        </select>

                      </div>

                      </div>
                      <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary update_student">Update changes</button>
                      </div>
                  </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div> 

          <!--end of edit student model-->

          <!--modal-->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
    $(document).ready(function (){
      
       //Create function that fetch students record
       //fetchstudent();
       //setInterval(function() {
        // Your AJAX call here
       // fetchstudent();
      //}, 10000); // 3000 milliseconds = 3 seconds

      //Swal Messages
      function toastMessage(){
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Data Saved Successfully",
              showConfirmButton: false,
              timer: 5000
            });


      }

      //end of swal messages

       fetchstudent();
       function fetchstudent(){
             $.ajax({
              type:'GET',
              url:"fetch-students",
              dataType:"json",
              success:function(response){
                 //console.log(response.students);
                 var total=response.total;
                 $('.stud_card').html(total);
                 $('tbody').html("")
                 $.each(response.students,function(key,item){
                  $('#table1').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.email+'</td>\
                        <td>'+item.phone+'</td>\
                        <td>'+item.course.name+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
                     });  
                
              }
             });
         }
       //end of function

       //add data to database
        $(document).on('click','.add_student',function (e){
           e.preventDefault();
           var data={
            'name':$('.name').val(),
            'email':$('.email').val(),
            'phone':$('.phone').val(),
            'course_id':$('.course_id').val(),
           }

           //console.log(data);

           //call ajax crud

           //csrf token for ajax

           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


           $.ajax({
             type:"post",
             url:"/students",
             data:data,
             dataType:"json",
             success:function(response){
                console.log(response);
                //get the error message
                if(response.status==400){
                  $('#saveform_errList').html("");
                  $('#saveform_errList').addClass("alert alert-danger");
                   $.each(response.errors,function(key,err_values){
                       $('#saveform_errList').append('<li>'+err_values+'</li>');
                   });
                }else{
                  $('#saveform_errList').html("");
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('#AddStudentModal').find('input').val("");
                  $('#AddStudentModal').modal('hide');
                  fetchstudent();
                 
                }

                //end of get error message
             }
           });
          
           //end of ajax crud
        });

        //end of add data
        //get data to be updated

        $(document).on('click','.edit_student',function(e){
           e.preventDefault();
           var stud_id=$(this).val();
           //console.log(stud_id);
           $('#EditStudentModal').modal('show');

           //get ajax request
            $.ajax({
              type:"GET",
              url:"/edit-student/"+stud_id,
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
                    $('#edit_stud_id').val(response.student.id);
                    $('#edit_name').val(response.student.name);
                    $('#edit_email').val(response.student.email);
                    $('#edit_phone').val(response.student.phone);
                    $('#edit_course').val(response.student.course.name);
                  }
              }

            });
           //end of ajax request
        });

        //get data to be updated

        $(document).on('click','.update_student',function(e){
              e.preventDefault();
              var stud_id=$('#edit_stud_id').val();
             
              //get data to be updated
              var data={
                'name':$('#edit_name').val(),
                'email':$('#edit_email').val(),
                'phone':$('#edit_phone').val(),
                'course':$('#edit_course').val(),
              }

              //end of get data to be updated

              //send ajax request
              $.ajaxSetup({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              }); 


              $.ajax({
                  type:"PUT",
                  url:"/update-student/"+stud_id,
                  data:data,
                  dataType:"json",
                  success:function(response){
                      console.log(response);

                      if(response.status==400)
                        {
                              $('#updateform_errList').html("");
                              $('#updateform_errList').addClass("alert alert-danger");
                              $.each(response.errors,function(key,err_values){
                                  $('#updateform_errList').append('<li>'+err_values+'</li>');
                              });

                        }

                        else if(response.status==400)
                          {
                              $('#updateform_errList').html("");
                              $('#success_message').addClass('alert alert-success');
                              $('#success_message').text(response.message);
                          }

                        else
                          {
                              $('#updateform_errList').html("");
                              $('#success_message').html("");
                              $('#success_message').addClass('alert alert-success');
                              $('#success_message').text(response.message);
                              $('#EditStudentModal').modal('hide');
                              fetchstudent();
                              //Swal.fire("SweetAlert2 is working!");
                              toastMessage();

                          }

                      /*get the error message
                      if(response.status==400)
                        {
                          $('#saveform_errList').html("");
                          $('#saveform_errList').addClass("alert alert-danger");
                          $.each(response.errors,function(key,err_values){
                              $('#saveform_errList').append('<li>'+err_values+'</li>');
                          });
                        }
                      else if(response.status==200)
                        {
                          $('#saveform_errList').html("");
                          $('#success_message').addClass('alert alert-success');
                          $('#success_message').text(response.message);
                          $('#AddStudentModal').modal('hide');
                          fetchstudent();
                        }

                      *///end of get error message
                  }
              });




              //end of send ajax request

        });
        //now update data

        //search data
        $('#search').on('keyup',function(){
          //alert("Search is taking palce")
          $value=$(this).val();
          //send ajax request
          $.ajax({
            url:"/search-students",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.students,function(key,item){
                  $('#table2').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.email+'</td>\
                        <td>'+item.phone+'</td>\
                        <td>'+item.course.name+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
              }); 

              //console.log(data);
              //$('#content').html();
            },
           
          });
        });

        //end of search data
         $('#show').on('change',function(){
          $value=$(this).val();
          $.ajax({
            url:"/show-students",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              var t_search=response.test_search;
              console.log(response.students);
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.students,function(key,item){
                  $('#table2').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.email+'</td>\
                        <td>'+item.phone+'</td>\
                        <td>'+item.course.name+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
              }); 


            }
          });
          //console.log($value);
         });
        //

        //end of search data
        $('#filter').on('change',function(){
          $value=$(this).val();
          $.ajax({
            url:"/filter-students",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              var t_search=response.test_search;
              console.log(response.students);
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.students,function(key,item){
                  $('#table2').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.email+'</td>\
                        <td>'+item.phone+'</td>\
                        <td>'+item.course.name+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
              }); 


            }
          });
          //console.log($value);
         });
        //

    });
</script>
@endsection