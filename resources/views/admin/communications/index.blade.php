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
                  <button class="btn  btn-info" id="addNewCom">Add New Communication</button>
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
                        <th>Recipient</th>
                        <th>Subject</th>
                        <th>Message</th>
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
            
          </div>
          <!--/.col (right) -->
      </div>
      <div class="row">

        <div class="col-md-12">
         
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              

             


            <!--edit student model-->
             <div class="modal fade" id="addMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title">Send Email</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnclose">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                       
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="errMsgContainer"></div>
                          <form role="form"  action="" method="post" id="addMessageForm">
                          <div class="row">
                              
                              <div class="col-sm-6">

                                  <div class="form-group">
                                    <label class="col-form-label" >Send To</label>
                                    <select class="form-control" id="recipient">
                                      <option value="All">All</option>
                                      <option value="System Administrator">System Administrator</option>
                                      <option value="Administrators">Administrators</option>
                                      <option value="Trainers">Trainers</option>
                                      <option value="Ilos">Ilos</option>
                                      <option value="Students">Students</option>
                                    </select>
                                  </div>

                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="col-form-label" >Subject</label>
                                  <input type="text" class="form-control" id="subject">
                                </div>
                              </div>


                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-form-label" >Message</label>
                                  <textarea class="form-control" id="message"></textarea>
                              </div>
                            </div>


                            </div>

                          </form>

                        

                        </div>
                        <!-- /.card-body -->
                      <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnclose">Close</button>
                      <button type="button" class="btn btn-primary" id="sendMessage">Send</button>
                      </div>
                  </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div> 

            <!--end of edit student model-->

            <!--edit student model-->
            <div class="modal fade" id="replyMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             
             <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                   <h4 class="modal-title">Reply Message</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="replyBtn">
                       <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                    
                     <!-- /.card-header -->
                     <div class="card-body">
                     <div class="errMsgContainer"></div>
                       <form role="form"  action="" method="post" id="replyMessageForm">
                       <div class="row">
                           
                          <label class="col-form-label" >Message</label>
                          <input type="text" id="message_id" class="form-control">

                         <div class="col-sm-12">
                           <div class="form-group">
                               <label class="col-form-label" >Message</label>
                               <textarea class="form-control" id="replymessage"></textarea>
                           </div>
                         </div>


                         </div>

                       </form>

                     

                     </div>
                     <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-danger" data-dismiss="modal" id="replyBtn">Close</button>
                   <button type="button" class="btn btn-primary" id="sendreplyMessage">Send</button>
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
   $('#addNewCom').on('click',function(){
     $('#addMessageModal').modal('show');
   });

  $('#btnclose').on('click',function(e){
    $('#addMessageModal').modal('hide');
  });

  $('#replyBtn').on('click',function(e){
    $('#replyMessageModal').modal('hide');
  });

  $('#update_company').hide();
   //Add data
   $(document).on('click','#sendMessage',function(e){
    e.preventDefault();
        $('.errMsgContainer').html("");

          //collect data
          let message=$('#message').val();
          let recipient=$('#recipient').val();
          let subject=$('#subject').val();
          //send ajax request
          $.ajax({
             url:"{{route('admin.send.cummunication')}}",
             method:"post",
             data:{
              recipient:recipient,
              message:message,
              subject:subject,
             },

             //secces
                success:function(res){
                  if(res.status==200){
                    $('#addMessageForm')[0].reset();
                    $('#addMessageModal').modal('hide');
                    //$('tbody').empty();
                    //fetchcompany();
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






    //fetch students

      fetchcompany();
       function fetchcompany(){
             $.ajax({
              type:'GET',
              url:"{{route('admin.fetch.cummunication')}}",
              dataType:"json",
              success:function(response){
                 $('tbody').html("")
                 $.each(response.mails,function(key,item){
                  $('#table1').append(
                     ' <tr>\
                        <td>'+item.recipient+'</td>\
                        <td>'+item.subject+'</td>\
                         <td>'+item.message+'</td>\
                        <td>'+item.status+'</td>\
                          <td>\
                          <button type="button" value="'+item.id+'" class="reply_message btn btn-primary btn-sm">Reply</button> <button type="button" value="'+item.id+'" class="delete_company btn btn-danger btn-sm">Delete</button> </td>\
                    </tr>');
                     });  
                
              }
             });
         }
    //end of function








        //get data to be updated
        $(document).on('click','.reply_message',function(e){
           e.preventDefault();
           var message_id=$(this).val();
           //console.log(message_id);
           //$('#addMessageForm')[0].reset();
           $('#replyMessageModal').modal('show');
           $('#message_id').val(message_id);
        });
        //get data to be updated









        //Add data
        $(document).on('click','#sendreplyMessage',function(e){
          e.preventDefault();
              $('.errMsgContainer').html("");

                //collect data
                let message_id=$('#message_id').val();
                let message=$('#replymessage').val();

                //send ajax request
                $.ajax({
                  url:"{{route('admin.reply.cummunication')}}",
                  method:"post",
                  data:{
                    message_id:message_id,
                    message:message,
                    
                  },

                  //secces
                      success:function(res){
                        if(res.status==200){
                          $('#replyMessageForm')[0].reset();
                          $('#replyMessageModal').modal('show');
                          $('tbody').empty();
                          fetchcompany();
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