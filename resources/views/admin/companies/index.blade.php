@extends('layouts.master')

@section('content')
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
         <div class="errMsgContainer"></div>
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

                <div class="col-sm-2">
                  <h1 class="card-title">COMPANIES</h1>
                </div>

                <div class="col-sm-1">
                 
                   <select class="form-control" id="show">
                     <option value="">Show</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="5">5</option>
                    </select> 
                

                </div>
               
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

              </div>
              <!--end of table-->




              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <form role="form"  action="" method="post" id="addCompanyForm">
                <div class="row">
                   <div class="col-sm-3">
                      <div class="form-group">
                        <label class="col-form-label" >Company Name</label>
                        <input type="text" class="form-control" id="company_name">
                      </div>
                    </div>

                    <div class="col-sm-3">

                        <div class="form-group">
                          <label class="col-form-label" >Select Industry</label>
                          <select class="form-control is-valid" id="company_industry">
                            <option value="None">None</option>
                            <option value="Aerospace And Defence">Aerospace And Defence</option>
                            <option value="Agriculture And Food Production">Agriculture And Food Production</option>
                          </select>
                        </div>

                    </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-form-label" >Select County</label>
                      <select class="form-control is-valid" id="company_county">
                          <option value="None">None</option>
                          <option value="Baringo">Baringo</option>
                          <option value="Bomet">Bomet</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-form-label" >Town</label>
                      <input type="text" class="form-control is-valid" id="company_town">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-form-label" >Company Contact Person</label>
                      <input type="text" class="form-control is-valid" id="company_contact_person_name">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-form-label" >Contact Person Email</label>
                      <input type="email" class="form-control is-valid" id="company_contact_person_email">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="col-form-label" >Contact Person Phone</label>
                      <input type="text" class="form-control is-valid" id="company_contact_person_phone">
                    </div>
                  </div>

                  <div class="col-sm-3" style="padding-top:35px;">
                    <div class="form-group">
                     <button type="button" name="button" id="add_company" class="btn btn-success">Add Company</button>
                     <button type="button" name="button" id="update_company" class="btn btn-info">Update Company</button>
                     <input type="text" name="id" id="company_id" hidden>
                    </div>
                  </div>

                  </div>

                </form>

              

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
              

             <!--second row-->
               <div class="row">
                 <div class="col-sm-12">
                    
                  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Industry</th>
                        <th>Company Location</th>
                        <th>ILO Name</th>
                        <th>ILO  Email</th>
                        <th>ILO  Phone</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody id="table1"></tbody>
                     
                      <tbody id="table2"></tbody>
                  </table>
                   

                 </div>
               </div>
             <!--end of second row-->


            <!--edit student model-->
             <div class="modal fade" id="DeleteCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title">Are You sure you want to delete this record</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                       
                        <input type="text" id="del_company_id">

                      </div>
                      <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger btnclose" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="removeCompany">Delete Company</button>
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

  $('.btnclose').on('click',function(e){
    $('#DeleteCompanyModal').modal('hide');
  });
  $('#update_company').hide();
   //Add data
   $(document).on('click','#add_company',function(e){
    e.preventDefault();
        $('.errMsgContainer').html("");

          //collect data
          let company_name=$('#company_name').val();
          let company_industry=$('#company_industry').val();
          let company_county=$('#company_county').val();
          let company_town=$('#company_town').val();
          let company_contact_person_name=$('#company_contact_person_name').val();
          let company_contact_person_email=$('#company_contact_person_email').val();
          let company_contact_person_phone=$('#company_contact_person_phone').val();

          //send ajax request
          $.ajax({
             url:"{{route('admin.add.company')}}",
             method:"post",
             data:{
              company_name:company_name,
              company_industry:company_industry,
              company_county:company_county,
              company_town:company_town,
              company_contact_person_name:company_contact_person_name,
              company_contact_person_email:company_contact_person_email,
              company_contact_person_phone:company_contact_person_phone,
             },

             //secces
                success:function(res){
                  if(res.status==200){
                    $('#addCompanyForm')[0].reset();
                    //$('tbody').empty();
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






      //fetch students
        fetchcompany();
        function fetchcompany(){
              $.ajax({
                type:'GET',
                url:"fetch-company",
                dataType:"json",
                success:function(response){
                  //console.log(response.students);
                  var total=response.total;
                  $('.stud_card').html(total);
                  $('tbody').html("")
                  $.each(response.companys,function(key,item){
                    $('#table1').append(
                      ' <tr>\
                          <td>'+item.company_name+'</td>\
                          <td>'+item.company_industry+'</td>\
                          <td>County: '+item.company_county+' Town: '+item.company_town+'</td>\
                          <td>'+item.company_contact_person_name+'</td>\
                          <td>'+item.company_contact_person_email+'</td>\
                          <td>'+item.company_contact_person_phone+'</td>\
                            <td>\
                            <button type="button" value="'+item.id+'" class="edit_company btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_company btn btn-danger btn-sm">Delete</button> </td>\
                      </tr>');
                      });  
                  
                }
              });
          }
      //end of function

        //get data to be updated
        $(document).on('click','.edit_company',function(e){
           e.preventDefault();
           var company_id=$(this).val();
           $('#add_company').hide();
           $('#update_company').show();
           //console.log(stud_id);
           //$('#EditCompanyModal').modal('show');

           //get ajax request
            $.ajax({
              type:"GET",
              url:"/edit-company/"+company_id,
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
                      $('#company_id').val(response.company.id);
                      $('#company_name').val(response.company.company_name);
                      $('#company_industry').val(response.company.company_industry);
                      $('#company_county').val(response.company.company_county);
                      $('#company_town').val(response.company.company_town);
                      $('#company_contact_person_name').val(response.company.company_contact_person_name);
                      $('#company_contact_person_email').val(response.company.company_contact_person_email);
                      $('#company_contact_person_phone').val(response.company.company_contact_person_phone);
                  }
              }

            });
           //end of ajax request
        });
        //get data to be updated



        //Add data
        $(document).on('click','#update_company',function(e){
          e.preventDefault();
              $('.errMsgContainer').html("");

                //collect data
                let company_id=$('#company_id').val();
                let company_name=$('#company_name').val();
                let company_industry=$('#company_industry').val();
                let company_county=$('#company_county').val();
                let company_town=$('#company_town').val();
                let company_contact_person_name=$('#company_contact_person_name').val();
                let company_contact_person_email=$('#company_contact_person_email').val();
                let company_contact_person_phone=$('#company_contact_person_phone').val();

                //send ajax request
                $.ajax({
                  url:"{{route('admin.update.company')}}",
                  method:"post",
                  data:{
                    company_id:company_id,
                    company_name:company_name,
                    company_industry:company_industry,
                    company_county:company_county,
                    company_town:company_town,
                    company_contact_person_name:company_contact_person_name,
                    company_contact_person_email:company_contact_person_email,
                    company_contact_person_phone:company_contact_person_phone,
                  },

                  //secces
                      success:function(res){
                        if(res.status==200){
                          $('#addCompanyForm')[0].reset();
                          //$('tbody').empty();
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





        //get data to be updated
         $(document).on('click','.delete_company',function(e){
           e.preventDefault();
           var company_id=$(this).val();
           //$('#add_company').hide();
           //$('#update_company').show();
           $('#DeleteCompanyModal').modal('show');

           //get ajax request
            $.ajax({
              type:"GET",
              url:"/edit-company/"+company_id,
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
                      $('#del_company_id').val(response.company.id);
                      
                  }
              }

            });
           //end of ajax request
        });
        //get data to be updated







        //Add data
        $(document).on('click','#removeCompany',function(e){
          e.preventDefault();
                //collect data
                let company_id=$('#del_company_id').val();

                //send ajax request
                $.ajax({
                  url:"{{route('admin.delete.company')}}",
                  method:"post",
                  data:{
                    company_id:company_id,
                    
                  },

                  //secces
                      success:function(res){
                        if(res.status==200){
                          $('#DeleteCompanyModal').modal('hide');
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