@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
<!--container-fluid -->
@if(!empty($setting))
<section class="content">
     <div class="container-fliud">
          <div class="row">
               <!--row1-->
               <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            Logo
                            <button type="button" class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#updatelogo">
                                     <i class="las la-plus"></i> Update Logo
                                </button>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"src="{{asset('uploads/company_logo/'.$setting->company_logo)}}">  
                            </div>
                        </div>
                    </div>

                     <!--card2-->
                     <div class="card">
                              <div class="card-body">
                                   <form method="POST" action="{{route('deletecompanySettings')}}">
                                       @csrf
                                        <input type="text" name="id" class="form-control" value="{{$setting->id}}" hidden="true">
                                        <button type="submit" class="btn btn-danger" style="width:100%;height: 50px;"> 
                                             <i class="las la-trash-alt"></i>
                                            Delete Settings
                                        </button>
                                   </form>
                              </div>
                         </div>
                         
                    <!--card3-->

                    
               </div>
               <!--row-2-->

              
               <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Settings </h3>
                                <button type="button" class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#updateSettings">
                                     <i class="las la-plus"></i> Update Settings
                                </button>
                           
                        </div>
                       
                        
                          
                            <div class="card-body">
                                
                                <div class="form-group row">
                                    
                                  

                                    <div class="col-sm-6">
                                        <label>Company Name</label>
                                        <input type="text"  class="form-control" value="{{$setting->company_name}}">
                                       
                                    </div>

                                    
                                    <div class="col-sm-6">
                                            <label>Company Vission</label>
                                            <input type="text"   class="form-control" value="{{$setting->company_vission}}">
                                    </div>

                                    
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                            <label>Company Mission</label>
                                            <input type="text" value="{{$setting->company_vission}}" class="form-control">
                                            
                                    </div>
                                    
                                    <div class="col-sm-6">
                                            <label>Company Phon</label>
                                            <input type="text"  class="form-control" value="{{$setting->company_phone}}">
                                            
                                    </div>
                                   
                                </div>
                               

                                <div class="form-group row">
                                  
                                    
                                    <div class="col-sm-6">
                                            <label>Company Email</label>
                                            <input type="text"  class="form-control" value="{{$setting->company_email}}">
                                    </div>
                                   
                                    <div class="col-sm-6">
                                            <label>Company Address</label>
                                            <input type="text" class="form-control" value="{{$setting->company_address}}">
                                            
                                    </div>

                                </div>

                                <div class="form-group row">
                                  
                                    <div class="col-sm-6">
                                           <label>Facebook Link</label>
                                            <input type="text"  class="form-control" value="{{$setting->facebook_link}}">
                                            
                                    </div>
                                  
                                    <div class="col-sm-6">
                                            <label>Twitter  Link</label>
                                            <input type="text"  class="form-control" value="{{$setting->twitter_link}}">
                                    </div>

                                </div>

                                <div class="form-group row">
                                   
                                    <div class="col-sm-6">
                                            <label>Instagram  Link</label>
                                            <input type="text"  class="form-control" value="{{$setting->instagram_link}}">
                                    </div>
                                   
                                    <div class="col-sm-6">
                                            <label>Linkdln Link</label>
                                            <input type="text"  class="form-control" value="{{$setting->linkdln_link}}">
                                            
                                            
                                    </div>

                                </div>

                                <div class="form-group row">
                                   
                                   <div class="col-sm-12">
                                           <label>Youtube  Link</label>
                                           <input type="text"  class="form-control" value="{{$setting->youtube_link}}">
                                           
                                   </div>
                                  
                               </div>

                                
                            
                            </div>
                            
                      

                    </div>
               </div>
              

          </div>
     </div>
</section>
@else
<section class="content">
     <div class="container-fliud">
          <div class="row">
               <!--row1-->
               <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            Company Logo
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"src="{{asset('uploads/company_logo/default_logo.png')}}">  
                            </div>
                        </div>
                    </div>

                   
               </div>
               <!--row-2-->

              
               <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Company Information </h3>
                               
                           
                        </div>
                       
                        <form method="POST" action="{{route('addcompanySettings')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6">
                                        <label>Company Logo</label>
                                        <input type="file"  name="company_logo" class="form-control @error('company_logo') is-invalid @enderror"  value=""  autocomplete="company_logo" autofocus>
                                        @error('company_logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-sm-6">
                                        <label>Company Name</label>
                                        <input type="text"  name="company_name" class="form-control @error('company_name') is-invalid @enderror"   value="{{ old('company_name') }}"  autocomplete="company_name" autofocus>
                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    
                                    <div class="col-sm-6">
                                            <label>Company Vission</label>
                                            <input type="text"   class="form-control @error('company_vission') is-invalid @enderror" name="company_vission" value="{{ old('company_vission') }}"  autocomplete="company_vission" autofocus>
                                            @error('company_vission')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    
                                    <div class="col-sm-6">
                                            <label>Company Mission</label>
                                            <input type="text"  name="company_mission" class="form-control @error('company_mission') is-invalid @enderror"  value="{{ old('company_mission') }}"  autocomplete="company_mission" autofocus>
                                            @error('company_mission')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    
                                </div>
                               

                                <div class="form-group row">
                                  
                                    <div class="col-sm-4">
                                            <label>Company Phon</label>
                                            <input type="text"  name="company_phone" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone" value="{{ old('company_phone') }}"  autocomplete="company_phone" autofocus>
                                            @error('company_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                    <div class="col-sm-4">
                                            <label>Company Email</label>
                                            <input type="text"  name="company_email" class="form-control @error('company_email') is-invalid @enderror"  value="{{ old('company_email') }}"  autocomplete="company_email" autofocus>
                                    </div>
                                   
                                    <div class="col-sm-4">
                                            <label>Company Address</label>
                                            <input type="text"  name="company_address" class="form-control @error('company_address') is-invalid @enderror"  value="{{ old('company_address') }}"  autocomplete="company_address" autofocus>
                                            @error('company_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                  
                                    <div class="col-sm-6">
                                           <label>Facebook Link</label>
                                            <input type="text"  name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror"  value="{{ old('facebook_link') }}"  autocomplete="facebook_link" autofocus>
                                            @error('facebook_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                  
                                    <div class="col-sm-6">
                                            <label>Twitter  Link</label>
                                            <input type="text"  name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror"  value="{{ old('twitter_link') }}"  autocomplete="twitter_link" autofocus>
                                            @error('twitter_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                   
                                    <div class="col-sm-6">
                                            <label>Instagram  Link</label>
                                            <input type="text"  name="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror"  value="{{ old('instagram_link') }}"  autocomplete="instagram_link" autofocus>
                                            @error('instagram_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                    <div class="col-sm-6">
                                            <label>Linkdln Link</label>
                                            <input type="text"  name="linkdln_link" class="form-control @error('linkdln_link') is-invalid @enderror"  value="{{ old('linkdln_link') }}"  autocomplete="linkdln_link" autofocus>
                                            @error('linkdln_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                    </div>

                                </div>

                                <div class="form-group row">
                                   
                                   <div class="col-sm-12">
                                           <label>Youtube  Link</label>
                                           <input type="text"  name="youtube_link" class="form-control @error('youtube_link') is-invalid @enderror"  value="{{ old('youtube_link') }}"  autocomplete="youtube_link" autofocus>
                                           @error('youtube_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           
                                   </div>
                                  
                               </div>

                                
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" style="width:100%">Add</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>

                    </div>
               </div>
              

          </div>
     </div>
</section>
@endif


<!--section for modal-->
@if(!empty($setting))
<div class="modal fade" id="updateSettings">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
               <i class="las la-plus"></i>
               Update Settings
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{route('updatecompanySettingsInfo')}}">
            @csrf
            <div class="modal-body">

                    <input type="text" name="id" class="form-control" value="{{$setting->id}}">
                    <div class="form-group row">
                        

                        <div class="col-sm-6">
                            <label>Company Name</label>
                            <input type="text"  name="company_name" class="form-control @error('company_name') is-invalid @enderror"  value="{{$setting->company_name}}"  autocomplete="company_name" autofocus>
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="col-sm-6">
                                <label>Company Vission</label>
                                <input type="text"   class="form-control @error('company_vission') is-invalid @enderror" name="company_vission" value="{{$setting->company_vission}}"  autocomplete="company_vission" autofocus>
                                @error('company_vission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        
                        <div class="col-sm-6">
                                <label>Company Mission</label>
                                <input type="text"  name="company_mission" class="form-control @error('company_mission') is-invalid @enderror"  value="{{$setting->company_mission }}"  autocomplete="company_mission" autofocus>
                                @error('company_mission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                    </div>



                    <div class="form-group row">
                                  
                        <div class="col-sm-4">
                                <label>Company Phon</label>
                                <input type="text"  name="company_phone" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone" value="{{$setting->company_phone }}"  autocomplete="company_phone" autofocus>
                                @error('company_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="col-sm-4">
                                <label>Company Email</label>
                                <input type="text"  name="company_email" class="form-control @error('company_email') is-invalid @enderror"  value="{{$setting->company_email}}"  autocomplete="company_email" autofocus>
                        </div>
                        
                        <div class="col-sm-4">
                                <label>Company Address</label>
                                <input type="text"  name="company_address" class="form-control @error('company_address') is-invalid @enderror"  value="{{$setting->company_address }}"  autocomplete="company_address" autofocus>
                                @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                                  
                        <div class="col-sm-6">
                                <label>Facebook Link</label>
                                <input type="text"  name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror"  value="{{ $setting->facebook_link }}"  autocomplete="facebook_link" autofocus>
                                @error('facebook_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="col-sm-6">
                                <label>Twitter  Link</label>
                                <input type="text"  name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror"  value="{{$setting->twitter_link}}"  autocomplete="twitter_link" autofocus>
                                @error('twitter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-6">
                                <label>Instagram  Link</label>
                                <input type="text"  name="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror"  value="{{ $setting->instagram_link }}"  autocomplete="instagram_link" autofocus>
                                @error('instagram_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="col-sm-6">
                                <label>Linkdln Link</label>
                                <input type="text"  name="linkdln_link" class="form-control @error('linkdln_link') is-invalid @enderror"  value="{{ $setting->linkdln_link }}"  autocomplete="linkdln_link" autofocus>
                                @error('linkdln_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>

                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                                <label>Youtube  Link</label>
                                <input type="text"  name="youtube_link" class="form-control @error('youtube_link') is-invalid @enderror"  value="{{$setting->youtube_link }}"  autocomplete="youtube_link" autofocus>
                                @error('youtube_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                @enderror
                                
                        </div>
                        
                    </div>

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
@endif
<!-- /.modal -->

@if(!empty($setting))
<!--section for modal-->
<div class="modal fade modal-sm" id="updatelogo">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-sm">
        <div class="modal-header">
            <h4 class="modal-title">
               <i class="las la-plus"></i>
               Update Settings
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{route('updatecompanySettingsLogo')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">


                    <div class="form-group row">
                        <input value="{{$setting->id}}" class="form-control" type="text" name="id">
                        
                        <div class="col-sm-6">
                            <label>Company Logo</label>
                            <input type="file"  name="company_logo" class="form-control @error('company_logo') is-invalid @enderror"  value="{{ old('company_logo') }}"  autocomplete="company_logo" autofocus>
                            @error('company_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                    </div>

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
@endif
<!-- /.modal -->

<!--end of modalad-->
@endsection