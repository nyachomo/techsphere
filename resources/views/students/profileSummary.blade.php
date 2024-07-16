@extends('layouts.master')
@section('content')


<!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
  </section>

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >
        <div class="card" style="border:2px solid red;border-radius:10px;">
          <div class="card-header">
            <button class="btn btn-primary">Print</button>
          </div>
          <div class="card-body" style="padding-left:50px">
              <div class="row">
                <div class="col-sm-2">
                     <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"src="{{asset('uploads/user_profile/'.$student->profile_image)}}">  
                      </div>
                </div>
                <div class="col-sm-10" style="text-align:left !important">
                  <h1>{{$student->name}}</h1>
                  <p>
                   o nec, vulputate pulvinar nibh. Nullam scelerisque nec neque quis gravida. Aenean neque erat, rutrum vitae dapibus ac, interdum sed ante.
                  </p>
                </div>
              </div>

              <div class="row">
                  <div class="col-sm-12">
                      <h2>1.0 Profesional Summary </h2>
                      @if($profesionalSummary->count()>0)
                         <p>{{$profesionalSummary->professional_summary}}</p>
                      @else
                        NA
                      @endif
                      <p>
                   
                     
                      </p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-sm-12">
                      <h2>2.0 Education </h2>
                      <table class="table table-bordered table-sm">
                        <thead>
                         <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Institution</th>
                            <th>Program</th>
                            <th>Grade Scored</th>
                            <th>Achievement</th>
                           
                         </tr>
                        </thead>

                       <tbody>
                        @if(!empty($educations))
                          @foreach($educations as $education)
                           <tr>
                              <td>{{$education->start_date}}</td>
                              <td>{{$education->end_date}}</td>
                              <td>{{$education->school_attended}}</td>
                              <td>{{$education->course_studied}}</td>
                              <td>{{$education->grade_scored}}</td>
                              <td>
                                 @if($education->achievements->count() > 0)
                                     @foreach ($education->achievements as $key => $achievement)
                                      <li>{{ $achievement->student_education_achivement}}</li>
                                     @endforeach
                                 @else
                                 NA
                                 @endif
                              </td>
                           </tr>
                          @endforeach
                        @endif
                       </tbody>

                      </table>
                  </div>
              </div>

              
              <div class="row">
                  <div class="col-sm-12">
                      <h2>3.0 Work Experience </h2>
                      <table class="table table-bordered table-sm">
                        <thead>
                         <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Company</th>
                            <th>Role</th>
                            <th>Achievement</th>
                           
                         </tr>
                        </thead>

                       <tbody>
                        @if(!empty($works))
                          @foreach($works as $work)
                           <tr>
                              <td>{{$work->start_date}}</td>
                              <td>{{$work->end_date}}</td>
                              <td>{{$work->company}}</td>
                              <td>{{$work->role}}</td>
                              <td>
                                 @if($work->achievements->count() > 0)
                                     @foreach ($work->achievements as $key => $achievement)
                                      <li>{{ $achievement->student_work_achivement}}</li>
                                     @endforeach
                                 @else
                                 NA
                                 @endif
                              </td>

                           </tr>
                          @endforeach
                        @else
                        <tr>
                              <td>{{NA}}</td>
                              <td>{{NA}}</td>
                              <td>{{NA}}</td>
                              <td>{{NA}}</td>
                              <td>{{NA}}</td>
                           </tr>
                        @endif
                       </tbody>
                       
                      </table>

                  </div>
              </div>

            
              <div class="row">
                <div class="col-sm-6">
                  <h3>4.0 Skills</h2>
                  <ul>
                     @if($skills->count()>0)
                      @foreach($skills as $skill)
                        <li>{{$skill->student_skills}}</li>
                       @endforeach
                     @else
                      NA
                     @endif
                  </ul>
                </div>

                <div class="col-sm-6">
                  <h3>5.0 Activities</h2>
                  <ul>
                    <li>​​Strong knowledge of medication therapy, drug interactions, and side effects​ </li>
                    <li>A solid understanding of hardware, software, networking, and IT systems</li>
                    <li>Good Problem-solving abilities:</li>
                    <li>Expert in Cybersecurity knowledge:</li>
                    <li>Good Communication skills</li>
                  </ul>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <h2>Referee</h2>
                       <table class="table table-bordered table-sm">
                        <thead>
                         <tr>
                            <th>Name</th>
                            <th>Phonenumber</th>
                            <th>Email Address</th>
                            <th>Organisation</th>
                            <th>Role</th>
                         </tr>
                        </thead>

                        <tbody>
                          @if(!empty($referees))
                            @foreach($referees as $referee)
                            <tr>
                                <td>{{$referee->referee_name}}</td>
                                <td>{{$referee->referee_phone}}</td>
                                <td>{{$referee->referee_email}}</td>
                                <td>{{$referee->referee_organisation}}</td>
                                <td>{{$referee->referee_position}}</td>
                            </tr>
                            @endforeach
                          @else
                          <tr>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                                <td>NA</td>
                            </tr>
                          @endif
                        </tbody>
                       
                      </table>
                </div>
              </div>

          </div>

        </div>
      </div>
    </section>
<!-- /.content -->
@endsection