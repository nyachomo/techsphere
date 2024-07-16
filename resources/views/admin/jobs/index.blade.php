@extends('layouts.master')

@section('content')
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
        
        </div>
      </div>
      <div class="row">

      <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                

                <!--firstrow-->
              <div class="row">
                <!--div class="col-sm-1">
                 <p><h1 class="stud_card card-title"></h1></p>
                </div-->

               
                
               
                <div class="col-sm-3">
                  <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here....">
                </div>
               
                <div class="col-sm-3">
                   <select class="form-control" id="filter">
                      <option value="">Filter by Industry</option>
                      <option value="Data Science">Data Science</option>
                      <option value="Cyber Security">Cyber Security</option>
                    </select> 
                </div>

               

                <div class="col-sm-3">

                  <div class="btn-group">
                    <button type="button" class="btn btn-success">Download</button>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="#">Pdf</a>
                        <a class="dropdown-item" href="#">Excel</a>
                        <a class="dropdown-item" href="#">Csv</a>
                      </div>
                    </button>
                  </div>

                </div>

                <div class="col-sm-3">
                  <button class="btn  btn-info" id="addNewJob">Add New Job</button>
                </div>

              </div>
              <!--end of table-->




              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                 <!--second row-->
               <div class="row">
                 <div class="col-sm-12">
                    
                  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Vacancy No</th>
                        <th>Vacancy Name</th>
                        <th>No of position</th>
                        <th>Opening Date</th>
                        <th>Clossing Date</th>
                        <th>Vacancy Status</th>
                        <th>Total Applicants</th>
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
            
          </div>
          <!--/.col (right) -->
      </div>
      <div class="row">

        <div class="col-md-12">
         
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              

             


            <!--edit student model-->
             <div class="modal fade addNewJobModal" id=" modal-xl">
             
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title">Add New Vacancy</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnclose">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                       
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="errMsgContainer"></div>
                          <form role="form"  action="" method="post" id="addMessageForm">
                          <div class="row">
                              
                              <div class="col-sm-4">

                                  <div class="form-group">
                                    <label class="col-form-label" >Vacany No</label>
                                    <input type="text" id="vacancy_no" class="form-control">
                                  </div>

                              </div>

                              <div class="col-sm-4">

                                  <div class="form-group">
                                    <label class="col-form-label" >Vacany Name</label>
                                    <input type="text" id="vacancy_name" class="form-control">
                                  </div>

                              </div>

                              <div class="col-sm-4">

                                  <div class="form-group">
                                    <label class="col-form-label" >No of position</label>
                                    <input type="number" id="no_of_position" class="form-control">
                                  </div>

                              </div>

                              <div class="col-sm-6">

                                  <div class="form-group">
                                    <label class="col-form-label" >Opening Date</label>
                                    <input type="date" id="opening_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                  </div>

                              </div>

                              <div class="col-sm-6">

                                  <div class="form-group">
                                    <label class="col-form-label" >Closing Date</label>
                                    <input type="date" id="closing_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                  </div>

                              </div>

                              <div class="col-sm-12">

                                  <div class="form-group">
                                    <label class="col-form-label" >Add Job Description</label>
                                    <textarea id="vacancy_description">
                                     
                                    </textarea>
                                  </div>

                              </div>

                              <div class="col-sm-12">

                                  <div class="form-group">
                                    <label class="col-form-label" >Add Responsibilities</label>
                                    <textarea id="vacancy_responsibility">
                                       <div class="desTest"></div>
                                    </textarea>
                                  </div>

                              </div>

                              <div class="col-sm-12">

                                  <div class="form-group">
                                    <label class="col-form-label" >Candidate Qualification</label>
                                    <textarea id="vacancy_qualification"></textarea>
                                  </div>

                              </div>


                            

                            </div>

                          </form>

                        

                        </div>
                        <!-- /.card-body -->
                      <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="modalBtnClose">Close</button>
                      <button type="button" class="btn btn-primary" id="addVacancy">Add</button>
                      </div>
                  </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div> 

            <!--end of edit student model-->


           <!--edit student model-->
            <div class="modal fade updateJobModal" id=" modal-xl">
             
             <div class="modal-dialog modal-xl">
               <div class="modal-content">
                   <div class="modal-header">
                   <h4 class="modal-title">Update Vacancy</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="updateJobbtnclose">
                       <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                    
                     <!-- /.card-header -->
                     <div class="card-body">
                     <div class="errMsgContainer"></div>
                       <form role="form"  action="" method="post" id="addMessageForm">
                       <div class="row">

                           <input type="text" id="vacancy_id" class="form-control">
                           
                           <div class="col-sm-4">

                               <div class="form-group">
                                 <label class="col-form-label" >Vacany No</label>
                                 <input type="text" id="update_vacancy_no" class="form-control">
                               </div>

                           </div>

                           <div class="col-sm-4">

                               <div class="form-group">
                                 <label class="col-form-label" >Vacany Name</label>
                                 <input type="text" id="update_vacancy_name" class="form-control">
                               </div>

                           </div>

                           <div class="col-sm-4">

                               <div class="form-group">
                                 <label class="col-form-label" >No of position</label>
                                 <input type="number" id="update_no_of_position" class="form-control">
                               </div>

                           </div>

                           <div class="col-sm-6">

                               <div class="form-group">
                                 <label class="col-form-label" >Opening Date</label>
                                 <input type="date" id="update_opening_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                               </div>

                           </div>

                           <div class="col-sm-6">

                               <div class="form-group">
                                 <label class="col-form-label" >Closing Date</label>
                                 <input type="date" id="update_closing_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                               </div>

                           </div>

                           <div class="col-sm-12">

                               <div class="form-group">
                                 <label class="col-form-label" >Add Job Description</label>
                                 <textarea id="update_vacancy_description" class="form-control">
                                  
                                 </textarea>
                               </div>

                           </div>

                           <div class="col-sm-12">

                               <div class="form-group">
                                 <label class="col-form-label" >Add Responsibilities</label>
                                 <textarea id="update_vacancy_responsibility" class="form-control"></textarea>
                               </div>

                           </div>

                           <div class="col-sm-12">

                               <div class="form-group">
                                 <label class="col-form-label" >Candidate Qualification</label>
                                 <textarea id="update_vacancy_qualification" class="form-control"></textarea>
                               </div>

                           </div>


                         

                         </div>

                       </form>

                     

                     </div>
                     <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-danger" data-dismiss="modal" id="updatemodalBtnClose">Close</button>
                   <button type="button" class="btn btn-primary" id="updateVacancy">Update</button>
                   </div>
               </div>
             <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
            </div> 

           <!--end of edit student model-->


           <!--edit student model-->
            <div class="modal fade viewJobModal" id=" modal-xl">
             
             <div class="modal-dialog modal-xl">
               <div class="modal-content">
                   <div class="modal-header">
                   <h4 class="modal-title">Update Vacancy</h4>
                  
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="viewJobbtnclose">
                       <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                    
                     <!-- /.card-header -->
                     <div class="card-body">
                       
                     <div class="description"></div>

                     <div class="responsibility"></div>

                     <div class="qualification"></div>

                      

                     </div>
                     <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-danger" data-dismiss="modal" id="viewmodalBtnClose">Close</button>
                  
                   </div>
               </div>
             <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
            </div> 
           <!--end of edit student model-->








           





             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--end of col-sm-6-->


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
  

 $(document).ready(function(){
   $('#addNewJob').on('click',function(){
     $('.addNewJobModal').modal('show');
   });

  $('#btnclose').on('click',function(e){
    $('.addNewJobModal').modal('hide');
  });

  $('#modalBtnClose').on('click',function(e){
    $('.addNewJobModal').modal('hide');
  });

  $('#updateJobbtnclose').on('click',function(e){
    $('.updateJobModal').modal('hide');
  });

  $('#updatemodalBtnClose').on('click',function(e){
    $('.updateJobModal').modal('hide');
  });



  $('#viewJobbtnclose').on('click',function(e){
    $('.viewJobModal').modal('hide');
  });

  $('#viewmodalBtnClose').on('click',function(e){
    $('.viewJobModal').modal('hide');
  });



  

  $('#replyBtn').on('click',function(e){
    $('.updateJobModal').modal('hide');
  });

   //Add Vacancy
   $(document).on('click','#addVacancy',function(e){
    e.preventDefault();
        $('.errMsgContainer').html("");

          //collect data
          let vacancy_no=$('#vacancy_no').val();
          let vacancy_name=$('#vacancy_name').val();
          let no_of_position=$('#no_of_position').val();
          let opening_date=$('#opening_date').val();
          let closing_date=$('#closing_date').val();
          let vacancy_description=$('#vacancy_description').val();
          let vacancy_responsibility=$('#vacancy_responsibility').val();
          let vacancy_qualification=$('#vacancy_qualification').val();
          //send ajax request
          $.ajax({
             url:"{{route('admin.add.vacancy')}}",
             method:"post",
             data:{
                vacancy_no:vacancy_no,
                vacancy_name:vacancy_name,
                no_of_position:no_of_position,
                opening_date:opening_date,
                closing_date:closing_date,
                vacancy_description:vacancy_description,
                vacancy_responsibility:vacancy_responsibility,
                vacancy_qualification:vacancy_qualification
             },

             //secces
                success:function(res){
                  if(res.status==200){
                    $('#addMessageForm')[0].reset();
                    $('.addNewJobModal').modal('hide');
                    //$('tbody').empty();
                    fetchjobs();
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






    //fetch Jobs
      fetchjobs();
       function fetchjobs(){
             $.ajax({
              type:'GET',
              url:"{{route('admin.fetch.vacancy')}}",
              dataType:"json",
              success:function(response){
                 $('tbody').html("")
                 $.each(response.jobs,function(key,item){
                  $('#table1').append(
                     ' <tr>\
                        <td>'+item.vacancy_no+'</td>\
                        <td>'+item.vacancy_name+'</td>\
                         <td>'+item.no_of_position+'</td>\
                         <td>'+item.opening_date+'</td>\
                          <td>'+item.closing_date+'</td>\
                          <td>'+item.vacancy_status+'</td>\
                           <td>'+item.total_applicants+'</td>\
                          <td>\
                          <button type="button" value="'+item.id+'" class="jobDesBtn btn btn-primary btn-sm">Update Vacancy</button> <button type="button" value="'+item.id+'" class="view_vacancy btn btn-secondary btn-sm">View Vacancy Details</button> </td>\
                    </tr>');
                     });  
                
              }
             });
         }
    //end of function








        //get data to be updated
        $(document).on('click','.jobDesBtn',function(e){
           e.preventDefault();
           var vacancy_id=$(this).val();
           //console.log(message_id);
           //$('#addMessageForm')[0].reset();
           $('.updateJobModal').modal('show');
           $('#vacancy_id').val(vacancy_id);

           //get ajax request
           $.ajax({
              type:"GET",
              url:"/edit-job/"+vacancy_id,
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

                    $('#update_vacancy_no').val(response.vacancy.vacancy_no);
                    $('#update_vacancy_name').val(response.vacancy.vacancy_name);
                    $('#update_no_of_position').val(response.vacancy.no_of_position);
                    $('#update_opening_date').val(response.vacancy.opening_date);
                    $('#update_closing_date').val(response.vacancy.closing_date);
                    $('#update_vacancy_description').append(response.vacancy_description);
                    $('#update_vacancy_responsibility').append(response.vacancy_responsibility);
                    $('#update_vacancy_qualification').append(response.vacancy_qualification);


                  }
              }

            });
           //end of ajax request

           //end of ajax

        });
        //get data to be updated




        
        //get data to be updated
        $(document).on('click','.view_vacancy',function(e){
           e.preventDefault();
           var vacancy_id=$(this).val();
           //console.log(message_id);
           //$('#addMessageForm')[0].reset();
           $('.viewJobModal').modal('show');
           $('#vacancy_id').val(vacancy_id);

           //get ajax request
           $.ajax({
              type:"GET",
              url:"/edit-job/"+vacancy_id,
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

                    $('#v_no').val(response.vacancy.vacancy_no);
                    $('#update_vacancy_name').val(response.vacancy.vacancy_name);
                    $('#update_no_of_position').val(response.vacancy.no_of_position);
                    $('#update_opening_date').val(response.vacancy.opening_date);
                    $('#update_closing_date').val(response.vacancy.closing_date);
                    $('#update_vacancy_description').val(response.vacancy_description);
                    $('#update_vacancy_responsibility').val(response.vacancy_responsibility);
                    $('#update_vacancy_qualification').val(response.vacancy_qualification);

                    $('.description').append('<p>'+response.vacancy.vacancy_description+'</p>');
                    $('.responsibility').append('<p>'+response.vacancy.vacancy_responsibility+'</p>');
                    $('.qualification').append('<p>'+response.vacancy.vacancy_qualification+'</p>');


                  }
              }

            });
           //end of ajax request

           //end of ajax

        });
        //get data to be updated









        //Add data
        $(document).on('click','#addJobDes',function(e){
          e.preventDefault();
              $('.errMsgContainer').html("");

                //collect data
                let vacancy_id=$('#vacancy_id').val();
                let message=$('#inp_editor1').val();
                console.log(message);

                
          
        });
       //end of update company


     





        




        //search data
        $('#search').on('keyup',function(){
          //alert("Search is taking palce")
          $value=$(this).val();
          //send ajax request
          $.ajax({
            url:"/search-company",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.companys,function(key,item){
                $('#table1').append(
                  ' <tr>\
                    <td>'+item.company_name+'</td>\
                    <td>'+item.company_industry+'</td>\
                    <td>County: '+item.company_county+' Town: '+item.company_town+'</td>\
                    <td>'+item.company_contact_person_name+'</td>\
                    <td>'+item.company_contact_person_email+'</td>\
                    <td>'+item.company_contact_person_phone+'</td>\
                    <td><button type="button" value="'+item.id+'" class="edit_company btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_company btn btn-danger btn-sm">Delete</button> </td>\
                </tr>');

              }); 

              //console.log(data);
              //$('#content').html();
            },
           
          });
        });








        //search data
        $('#filter').on('change',function(){
          //alert("Search is taking palce")
          $value=$(this).val();
          //send ajax request
          $.ajax({
            url:"/filter-company",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.companys,function(key,item){
                $('#table1').append(
                  ' <tr>\
                    <td>'+item.company_name+'</td>\
                    <td>'+item.company_industry+'</td>\
                    <td>County: '+item.company_county+' Town: '+item.company_town+'</td>\
                    <td>'+item.company_contact_person_name+'</td>\
                    <td>'+item.company_contact_person_email+'</td>\
                    <td>'+item.company_contact_person_phone+'</td>\
                    <td><button type="button" value="'+item.id+'" class="edit_company btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_company btn btn-danger btn-sm">Delete</button> </td>\
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
            url:"/show-company",
            method:"GET",
            data:{'search':$value},
            success:function(response){
              var total=response.total;
              $('#table1').empty();
              $('#table2').empty();
              $('.stud_card').html(total);

              $.each(response.companys,function(key,item){
                $('#table1').append(
                  ' <tr>\
                    <td>'+item.company_name+'</td>\
                    <td>'+item.company_industry+'</td>\
                    <td>County: '+item.company_county+' Town: '+item.company_town+'</td>\
                    <td>'+item.company_contact_person_name+'</td>\
                    <td>'+item.company_contact_person_email+'</td>\
                    <td>'+item.company_contact_person_phone+'</td>\
                    <td><button type="button" value="'+item.id+'" class="edit_company btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_company btn btn-danger btn-sm">Delete</button> </td>\
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