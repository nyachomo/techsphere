@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Work Experience</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Work Experience</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->
<section class="content">
    <div class="card">
        <div class="card-body">
            <!--container for error message-->
             <div class="errorMessage"></div>
            <!--container for errow message-->
            <!--student_id-->
            <input type="text" class="form-control" id="student_id" value="{{$student_id}}" hidden="true">
            <form role="form" id="addWorkExperienceForm" method="post">
                
                <!--work_id-->
                <input type="text" class="form-control" id="work_id" hidden="true">
                <!--student_id-->
                <!--first row-->
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" id="start_date" class="form-control">
                        </div>
                    </div>
                    <!--end from-->
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>To</label>
                            <input type="text" id="end_date" class="form-control">
                        </div>
                    </div>
                    <!--end to-->
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" id="company" class="form-control">
                        </div>
                    </div>
                    <!--company-->
                    <!--your role-->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>What was your role</label>
                            <input type="text" id="role" class="form-control">
                        </div>
                    </div>

                     <!--role-->
                   <div class="col-sm-3">
                        <div class="form-group">
                            <label>Reason for Leaving</label>
                            <input type="text" id="reason_for_leaving" class="form-control">
                        </div>
                    </div>
                    
                    
                    <!--reason for leaving-->

                </div>
                
                <!--third row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>What was your achivements</label>
                            <textarea class="form-control" id="achivement"></textarea>
                        <div>
                    </div>
                </div>
                <!--end third row-->
                <!--forth row-->
                <div class="row">
                    <!--discard button-->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger" style="width:100%" id="discardBtn">Discard</button>
                        </div>
                    </div>
                    <!--end discard button-->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-success" style="width:100%" id="addWorkEperience">Add</button>
                            <button class="btn btn-success" style="width:100%;display:none;" id="updateWorkEperience" >Update</button>
                        </div>
                    </div>
                    <!--end add button-->
                </div>
                <!--end of forth row-->
            </form>
        </div>
    </div>

    <!--modal for update-->
    <!--edit student model-->
    <div class="modal fade" id="deleteWorkExperienceModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Are You sure you want to delete this record ?</h6>
                      <button type="button" class="close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <!--modal-body-->
              
                  <input type="text" id="delete_work_id" hidden=""true>
              
                <!--end modal-body-->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" id="btnClose">Close</button>
                    <button type="button" class="btn btn-primary" id="deleteWorkExperienceBtn">Delete</button>
                </div>

                <!--modal-footer-->
            </div>
        </div>
    </div>
           
    <!--end modal for update-->
</section>

<section class="content">
    <!--get work experience data-->
    <div class="card">
        <!--card-body-->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-stripped table-sm table-bordered">
                       <!--thead-->
                       <thead>
                         <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Company</th>
                            <th>Role</th>
                            <th>Achivements</th>
                            <th>Reason For Leaving</th>
                            <th>Action</th>
                         </tr>
                       </thead>
                       <!--end thead-->
                       <tbody id="tbody1"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end-card-body-->
    </div>
    <!--end of get data-->
</section>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    //WHEN BUTTON CLOSE IS CLICKED HIDE THE BUTTON
    $('#btnClose').on('click',function(e){
        $('#deleteWorkExperienceModal').modal('hide');
    })

    //WHEN BUTTON CLOSE IS CLICKED HIDE THE MODAL
    $('.close').on('click',function(e){
        $('#deleteWorkExperienceModal').modal('hide');
    })

    //CALL THE FUNCTION THAT FETCH WORK EXPERIENCE DATA
    $('#discardBtn').on('click',function(e){
        e.preventDefault();
        $('.errorMessage').html('');
        $('#updateWorkEperience').hide();
        $('#addWorkEperience').show();
        $('#addWorkExperienceForm')[0].reset();
    })
    fetchWorkExperience()
    //ADDING WORK EXPERIENCE
    $('#addWorkEperience').on('click',function(e){
        //prevent default refresh
        e.preventDefault();
        //collect form values
        let student_id=$('#student_id').val();
        let start_date=$('#start_date').val();
        let end_date=$('#end_date').val();
        let company=$('#company').val();
        let role=$('#role').val();
        let achivement=$('#achivement').val();
        let reason_for_leaving=$('#reason_for_leaving').val();

        //pass the data as an object
        let data={student_id:student_id,start_date:start_date,end_date:end_date,company:company, role:role,achivement:achivement,reason_for_leaving:reason_for_leaving};
        //call ajax request

        $.ajax({
            url:"{{route('student.addWorkExperience')}}",
            method:"post",
            data:data,
            success:function(response){
                $('#addWorkExperienceForm')[0].reset();
                fetchWorkExperience();
            },
            error:function(err){
                $('.errorMessage').html('');
                let error=err.responseJSON;
                 $.each(error.errors,function(index,value){
                    $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                 });
            },
        });


      
    })

    //END OF ADDING WORK EXPERIENCE

    //FETCHING WORK EXPERIENCE
     function fetchWorkExperience(){
        $.ajax({
            url:"{{route('student.fetchWorkExperience')}}",
            method:"get",
            dataType:"json",
                success:function(response){
                  $('tbody').html("")
                  $.each(response.works,function(key,item){
                    $('#tbody1').append(
                      ' <tr>\
                          <td>'+item.start_date+'</td>\
                          <td>'+item.end_date+'</td>\
                          <td>'+item.company+'</td>\
                          <td>'+item.role+'</td>\
                          <td>'+item.achivement+'</td>\
                          <td>'+item.reason_for_leaving+'</td>\
                            <td>\
                            <button type="button" value="'+item.id+'" class="edit_workExperience btn btn-primary btn-sm">Edit</button> <button type="button" value="'+item.id+'" class="delete_workExperienceBtn btn btn-danger btn-sm">Delete</button> </td>\
                        </tr>');
                      });  
                  
                }
        })
     }
    //END OF FETCHING WORK EXPERIENCE
    $(document).on('click','.edit_workExperience',function(e){
        e.preventDefault();
        var work_id=$(this).val();
        //get ajax request
        $.ajax({
              type:"GET",
              url:"/student/edit-workExperience/"+work_id,
              success:function(response){
                      $('#work_id').val(response.work.id);
                      $('#start_date').val(response.work.start_date);
                      $('#end_date').val(response.work.end_date);
                      $('#company').val(response.work.company);
                      $('#role').val(response.work.role);
                      $('#achivement').val(response.work.achivement);
                      $('#reason_for_leaving').val(response.work.reason_for_leaving);
                      $('#addWorkEperience').hide()
                      $('#updateWorkEperience').show();
              }

        });
        //end of ajax request

     })
    //GET DATA TO EDIT

    //UPDATE COMAPNY
    $('#updateWorkEperience').on('click',function(e){
        e.preventDefault();
        let work_id=$('#work_id').val();
        let start_date=$('#start_date').val();
        let end_date=$('#end_date').val();
        let company=$('#company').val();
        let role=$('#role').val();
        let achivement=$('#achivement').val();
        let reason_for_leaving=$('#reason_for_leaving').val();
        //pass the data as an object
        let data={work_id:work_id,start_date:start_date,end_date:end_date,company:company, role:role,achivement:achivement,reason_for_leaving:reason_for_leaving};
        //call ajax request
        $.ajax({
          url:"{{route('student.updateWorkExperience')}}",
          method:"post",
          data:data,
          success:function(response){
            fetchWorkExperience()
           
          },
          error:function(err){
               $('.errorMessage').html('');
                let error=err.responseJSON;
                 $.each(error.errors,function(index,value){
                    $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                 });
            },
        })
    })
    //END UPDATE COMPANY

    //DELETE WORK EXPERIENCE
    $(document).on('click','.delete_workExperienceBtn',function(e){
      e.preventDefault();
      var work_id=$(this).val();
      $('#addWorkExperienceForm')[0].reset();
      $('#deleteWorkExperienceModal').modal('show');
      $('#updateWorkEperience').hide();
      $('#addWorkEperience').show();
      //get ajax request
      $.ajax({
              type:"GET",
              url:"/student/edit-workExperience/"+work_id,
              success:function(response){
              $('#delete_work_id').val(response.work.id);
                     
              }

        });
        //end of ajax request

     })
    //DELETE WORK EXPERIENCE

    //DELETE WORK EXPERIENCE
     $('#deleteWorkExperienceBtn').on('click',function(e){
        //get data to delete
        let work_id=$('#delete_work_id').val();
        let data={work_id:work_id};

        $.ajax({
            url:"{{route('student.deleteWorkExperience')}}",
            method:"post",
            data:data,
            success:function(){ $('#deleteWorkExperienceModal').modal('hide');fetchWorkExperience();},
        })

     })
    //DELETE WORK EXPERIENCE





  })
</script>
@endsection























