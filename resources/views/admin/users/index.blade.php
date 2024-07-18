@extends('layouts.master')
@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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

                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal" style="float:right">
                  <i class="fa fa-plus"></i> Add new user
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
                <!--COL 1
                <div class="col-sm-1">Show:</div>
                <div class="col-sm-1">
                 
                   <select class="form-control" id="show">
                     <option value="">All</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="5">5</option>
                    </select> 
                

                </div>
                -->
                <div class="col-sm-1">
                  Search
                </div>
                <div class="col-sm-3">
                  <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here....">
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
                      
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
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
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" id="addUserForm" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <div class="errMsgContainer"></div>

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" class="name form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="text" class="email form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phonenumber</label>
                            <input type="text" class="phone form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Role</label>
                            <select class="role form-control">
                                <option value="None">None</option>
                                <option value="System Admin">System Admin</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Trainer">Trainer</option>
                                <option value="Data Clerk">Data Clerk</option>
                                <option value="Student">Student</option>
                            </select>
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select class="status form-control">
                                <option value="None">None</option>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                            
                        </div>


                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add_user">Add User</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
            </form>
                <!-- /.modal-dialog -->
        </div>
        <!--end of add student model-->

        <!--Add Student modal-->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" id="updateUserForm" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalclose">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <div class="errMsgContainer"></div>
                         <input type="text" class="id form-control" id="edit_id">

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" class="name form-control" id="edit_name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="text" class="email form-control" id="edit_email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phonenumber</label>
                            <input type="text" class="phone form-control" id="edit_phone">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Role</label>
                            <select class="role form-control" id="edit_role">
                                <option value="None">None</option>
                                <option value="System Admin">System Admin</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Trainer">Trainer</option>
                                <option value="Student">Student</option>
                                <option value="Data Clerk">Data Clerk</option>
                                <option value="ILO">ILO</option>
                            </select>
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select class="status form-control" id="edit_status">
                                <option value="None">None</option>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                            
                        </div>


                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="modalclose">Close</button>
                        <button type="button" class="btn btn-primary update_user">Update User</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
            </form>
                <!-- /.modal-dialog -->
        </div>
        <!--end of add student model-->


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

$(document).ready(function(){
       $('#modalclose').on('click',function(e){
         e.preventDefault();
         $('#editUserModal').modal('hide');
       });
        //get the data from add button
        $(document).on('click','.add_user',function(e){
            e.preventDefault();
            $('.errMsgContainer').html("");
            let name=$('.name').val();
            let email=$('.email').val();
            let phone=$('.phone').val();
            let role=$('.role').val();
            let status=$('.status').val(); 

            $.ajax({
                url:"{{route('admin.adduser')}}",
                method:"post",
                data:{
                    name:name,
                    email:email,
                    phone:phone,
                    role:role,
                    status:status,
                },
                success:function(response){
                    if(response.status==200)
                    {
                       
                        $('#addUserForm')[0].reset();
                        $('#addModal').modal('hide');
                        fetchusers();
                    }
                },
                error:function(err){
                    let error=err.responseJSON;
                 $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                 });

                },
            });

        });


        //end of swal messages
       fetchusers();
       function fetchusers(){
             $.ajax({
              type:'GET',
              url:"{{route('admin.fetchusers')}}",
              dataType:"json",
              success:function(response){
                 //console.log(response.students);
                 var total=response.total;
                 $('.stud_card').html(total);
                 $('tbody').html("")
                 $.each(response.users,function(key,item){
                  $('#table1').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.phone+'</td>\
                        <td>'+item.email+'</td>\
                        <td>'+item.role+'</td>\
                        <td>'+item.status+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_user btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_user btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');

                     });  
                
              }
             });
         }
       //end of function

       //get data to be updated
        $(document).on('click','.edit_user',function(e){
            e.preventDefault();
            var user_id=$(this).val();
            
            $('#editUserModal').modal('show');

            //get ajax request
              $.ajax({
                type:"GET",
                url:"/edit-user/"+user_id,
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
                      $('#edit_id').val(response.user.id);
                      $('#edit_name').val(response.user.name);
                      $('#edit_email').val(response.user.email);
                      $('#edit_phone').val(response.user.phone);
                      $('#edit_role').val(response.user.role);
                      $('#edit_status').val(response.user.status);
                    }
                }

              });
            //end of ajax request
        });
        //get data to be updated

      //now update students


      //update data now
        $(document).on('click','.update_user',function(e){
                  e.preventDefault();
                  var user_id=$('#edit_id').val();
                
                  //get data to be updated
                  let name=$('#edit_name').val();
                  let email=$('#edit_email').val();
                  let phone=$('#edit_phone').val();
                  let role=$('#edit_role').val();
                  let status=$('#edit_status').val(); 

                  //end of get data to be updated

                  //send ajax request
                  $.ajaxSetup({
                    headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  }); 


                  $.ajax({
                      url:"/update-user/"+user_id,
                      method:"PUT",
                      data:{
                          name:name,
                          email:email,
                          phone:phone,
                          role:role,
                          status:status,
                      },
                      success:function(response){
                          if(response.status==200)
                          {
                            
                              $('#updateModal').modal('hide');
                              fetchusers();
                          }
                      },
                      error:function(err){
                          let error=err.responseJSON;
                      $.each(error.errors,function(index,value){
                          $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                      });

                      },
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
            url:"/search-user",
            method:"GET",
            data:{'search':$value},
            success:function(response){
             
              $('#table1').empty();
              $('#table2').empty();
              $.each(response.users,function(key,item){
               

                $('#table1').append(
                     ' <tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.phone+'</td>\
                        <td>'+item.email+'</td>\
                        <td>'+item.role+'</td>\
                        <td>'+item.status+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_user btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_user btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');

    
              }); 

              //console.log(data);
              //$('#content').html();
            },
           
          });
        });

        //end of search

      //end of update students



});


       

</script>
@endsection