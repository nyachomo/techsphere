@extends('layouts.master')
@section('content')
<?php
use App\Models\Course;
$courses=Course::all();
?>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!--row 1-->
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
                   <select class="form-control" id="filter">
                    <option value="">All</option>
                    @foreach($courses as $course)
                      <option value="{{$course->name}}">{{$course->name}}</option>
                    @endforeach
                    </select> 
                </div>
        </div>
      <!--end of row 1-->

      <!--end row 2-->
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Courses</h3>

              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
              Add Course
            </button>

            </div>
            <div class="card-body">

            <!--table-->
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Level</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Price</th>
                  <th scope="col">Action</th>
                </tr>
                <tbody id="table1"></tbody> 
                <tbody id="table2"></tbody>
                
              </tbody>
            </table>    
            
            <!--table-->
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div>
      <!--end of row 2-->



      <!--modal-->

      <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="" method="post" id="addCourseForm">
             @csrf
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="errMsgContainer"></div>

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Course name">
                  </div>

                  <div class="form-group">
                    <label for="name">Level</label>
                    <input type="text" name="level" class="form-control" id="level" placeholder="Course Level">
                  </div>

                  <div class="form-group">
                    <label for="name">Duration</label>
                    <input type="text" name="duration" class="form-control" id="duration" placeholder="Course duration">
                  </div>

                  <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Course price">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary add_course">Save Course</button>
                </div>
              </div>
            </div>


          </form>
        </div>

      <!--end of modal-->

      <!--edit student model-->
      <div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit | Update Course</h4>
                <button type="button" class="close btnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                

                <ul id="updateform_errList">


                </ul>
                  
                <input type="text" id="edit_stud_id">
                <div class="form-group mb-3">
                    <label for="">Course name</label>
                    <input type="text" id="edit_name" class="name form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Course Level</label>
                    <input type="text" id="edit_level" class="level form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Course Duration</label>
                    <input type="text" id="edit_duration" class="duration form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Course Price</label>
                    <input type="text" id="edit_price" class="price form-control">
                </div>

                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btnclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_student">Update changes</button>
                </div>
            </div>
          <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div> 
      <!--end of edit student model-->

      <!--edit student model-->
      <div class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Delete Students</h4>
                <button type="button" class="close btnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  
                <input type="text" id="edit2_stud_id">
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btnclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete2_student">Delete</button>
                </div>
            </div>
          <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div> 
      <!--end of edit student model-->
          


    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>

  

  //Swal Messages
    function toastMessage(){
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Data Saved Successfully",
              showConfirmButton: false,
              timer: 4000
            });
    }

    function deleteMessage(){
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Record Deleted successfully",
              showConfirmButton: false,
              timer: 4000,
        });
    }
  //main function
   $(document).ready(function(){

      $('.btnclose').on('click',function(){
        $('#EditStudentModal').modal('hide');
      }); 

       //fetchcourses();
      //adding course
        $(document).on('click','.add_course',function(e){
          e.preventDefault();

          $('.errMsgContainer').html("");

          //collect data
          let name=$('#name').val();
          let level=$('#level').val();
          let duration=$('#duration').val();
          let price=$('#price').val();
          //send ajax request
          $.ajax({
             url:"{{route('add.course')}}",
             method:"post",
             data:{
                  name:name,
                  level:level,
                  duration:duration,
                  price:price
             },

             //secces
                success:function(res){
                  if(res.status==200){
                    $('#addModal').modal('hide');
                    $('#addCourseForm')[0].reset();
                    $('#table1').empty();
                    $('#table2').empty();
                    fetchcourses();
                  }
                },
             //end of success

             //error
               error:function(err){
                 let error=err.responseJSON;
                 $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                 });
               }
             //end of error
          });
          //end of ajax request

        });
      //end of adding course

      //fetching course
        fetchcourses();
        function fetchcourses(){
             $.ajax({
              type:'GET',
              url:"/fetch-courses",
              dataType:"json",
              success:function(response){
                $('#table1').empty();
                $('#table2').empty();
                 $.each(response.courses,function(key,item){
                  $('tbody').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.level+'</td>\
                        <td>'+item.duration+'</td>\
                        <td>'+item.price+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
                     });  
                
              }
             });
         }

        //get data to be updated
        $(document).on('click','.edit_student',function(e){
            e.preventDefault();
            var course_id=$(this).val();
            console.log(course_id);
            $('#EditStudentModal').modal('show');

            //get ajax request
              $.ajax({
                type:"GET",
                url:"/edit-course/"+course_id,
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
                      $('#edit_stud_id').val(response.course.id);
                      $('#edit_name').val(response.course.name);
                      $('#edit_level').val(response.course.level);
                      $('#edit_duration').val(response.course.duration);
                      $('#edit_price').val(response.course.price);
                    }
                }

              });
            //end of ajax request
        });
        //get data to be updated

        //update data now
          $(document).on('click','.update_student',function(e){
                      e.preventDefault();
                      var course_id=$('#edit_stud_id').val();
                    
                      //get data to be updated
                      var data={
                        'name':$('#edit_name').val(),
                        'level':$('#edit_level').val(),
                        'duration':$('#edit_duration').val(),
                        'price':$('#edit_price').val(),
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
                          url:"/update-course/"+course_id,
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
                                      $('tbody').empty()
                                      fetchcourses();
                                      //Swal.fire("SweetAlert2 is working!");
                                      toastMessage();

                                  }

                            
                            ///end of get error message
                          }
                      });




                      //end of send ajax request

          });
        //end of now update data

        //get data to delete
        $(document).on('click','.delete_student',function(e){
            e.preventDefault();
            var course_id=$(this).val();
            console.log(course_id);
            $('#DeleteStudentModal').modal('show');

            //get ajax request
              $.ajax({
                type:"GET",
                url:"/edit-course/"+course_id,
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
                      console.log(response)
                      $('#edit2_stud_id').val(response.course.id);
                      $('#edit2_name').val(response.course.name);
                      $('#edit2_level').val(response.course.level);
                      $('#edit2_duration').val(response.course.duration);
                      $('#edit2_price').val(response.course.price);
                    }
                }

              });
            //end of ajax request
        });
        //end of get data to delete

        //update data now
         $(document).on('click','.delete2_student',function(e){
                      e.preventDefault();
                      var course_id=$('#edit2_stud_id').val();

                      //send ajax request
                      $.ajaxSetup({
                        headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      }); 

                      $.ajax({
                          type:"GET",
                          url:"/delete-course/"+course_id,
                          success:function(response){
                              console.log(response);
                              if(response.status==200)
                              {
                                      $('#DeleteStudentModal').modal('hide');
                                      fetchcourses();
                                      //Swal.fire("SweetAlert2 is working!");
                                      deleteMessage();
                              }
                              else
                              {
                                $('#DeleteStudentModal').modal('hide');
                                toastMessage();
                              }

                            ///end of get error message
                          }
                      });
                      //end of send ajax request

          });
        //end of now update data

    
        //search data
        $('#search').on('keyup',function(){
          //alert("Search is taking palce")
          $value=$(this).val();
          //send ajax request
          $.ajax({
            url:"/search-course",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.courses,function(key,item){
               

                $('#table2').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.level+'</td>\
                        <td>'+item.duration+'</td>\
                        <td>'+item.price+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
    
              }); 

              //console.log(data);
              //$('#content').html();
            },
           
          });
        });

        //end of search

        //filter  data by course
        $('#filter').on('change',function(){
          //alert("Search is taking palce")
          $value=$(this).val();
          //send ajax request
          $.ajax({
            url:"/filter-course",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.courses,function(key,item){
               

                $('#table2').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.level+'</td>\
                        <td>'+item.duration+'</td>\
                        <td>'+item.price+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
    
              }); 

              //console.log(data);
              //$('#content').html();
            },
           
          });
        });
        //end of filter data

        //filter  data by course
        $('#show').on('change',function(){
          //alert("Search is taking palce")
          $value=$(this).val();
          //send ajax request
          $.ajax({
            url:"/show-course",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.courses,function(key,item){
               

                $('#table2').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.level+'</td>\
                        <td>'+item.duration+'</td>\
                        <td>'+item.price+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
    
              }); 

              //console.log(data);
              //$('#content').html();
            },
           
          });
        });
        //end of filter data



   });
   //end of main function

   

  

</script>
@endsection