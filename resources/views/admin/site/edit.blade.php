@extends('layouts.admin')

@section('css')
@endsection

@section('content')
		<main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="full-container">
              <div class="email-app">
              <div class="email-side-nav remain-height ov-h">
                <div class="h-100 layers">
                  <div class="p-20 bgc-grey-100 layer w-100">
                    <a href="{{ route('admin.site.listing') }}" class="btn btn-danger btn-block">View Site Listing</a>
                  </div>
                  <div class="scrollable pos-r bdT layer w-100 fxg-1">
                    <ul class="p-20 nav flex-column">
                      <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link c-grey-800 cH-blue-500 actived">
                          <div class="peers ai-c jc-sb">
                            <div class="peer peer-greed">
                              <i class="mR-10 ti-email"></i>
                              <span>Go Back</span>
                            </div>
                            <div class="peer">
                              <span class="badge badge-pill bgc-deep-purple-50 c-deep-purple-700">+99</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Add Msg Here -->
              @if(session('success'))
              <div class="alert alert-success alert-dismissable custom-success-box">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('success') }}
              </div> 
              @endif

               @if(session('failed'))
              <div class="alert alert-danger alert-dismissable custom-success-box">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('failed') }}
              </div> 
              @endif
              
              @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissable custom-success-box">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <!-- Close Msg Here -->
              <div class="email-wrapper row remain-height pos-r scrollable bgc-white">
                <div class="email-content open no-inbox-view">
                  <div class="email-compose">
                    <div class="d-n@md+ p-20">
                      <a class="email-side-toggle c-grey-900 cH-blue-500 td-n" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                      </a>
                    </div>
                    <form method="post" action="{{ route('admin.site.update') }}" enctype="multipart/form-data" class="email-compose-body">
                      @csrf
                      
                      <input type="hidden" name="id" value="{{ $record->id }}">
                      <h4 class="c-grey-900 mB-20">Update Site </h4>
                      <div class="send-header">
                        <div class="form-group">
                          <input type="text" class='form-control' name="code" value="{{ $record->code }}" placeholder="Code Like pk">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="name" value="{{ $record->name }}" placeholder="Name">
                        </div>

                        <div class="form-group">
                          <input type="file" class="form-control" id="logo" name="logo"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Upload Logo</label>
                        </div>

                        <div class="form-group">
                        	<img src="{{ url('/thumbnail/') }}/{{ $record->logo }}" width="120px;" height="120px;"></td>
                        </div>
                        <hr>

                        <div class="form-group">
                          <input type="file" class="form-control" id="flag" name="flag"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Upload Flag</label>
                        </div>

                        <div class="form-group">
                          <img src="{{ url('/thumbnail/') }}/{{ $record->flag }}" width="100px;" height="100px;"></td>
                        </div>

                        <hr>
                        <div class="form-group">
                          <input type="text" class='form-control' name="footer_about_text" value="{{ $record->footer_about_text }}" placeholder="Please enter footer about text if you have">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="footer_text" value="{{ $record->footer_text }}" placeholder="Copyright @ design code 2019">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="footer_email" value="{{ $record->footer_email }}" placeholder="info@designcode.com">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="facebook_link" value="{{ $record->facebook_link }}" placeholder="https://facebook.com/designcode">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="linkedin_link" value="{{ $record->linkedin_link }}" placeholder="https://linkeding.com/designcode">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="youtube_link" value="{{ $record->youtube_link }}" placeholder="https://youtube.com/designcode">
                        </div>

                        <div class="form-group">
                          <input type="text" class='form-control' name="google_plus_link" value="{{ $record->google_plus_link }}" placeholder="https://googleplus.com/designcode">
                        </div>


                      </div>
					  
                      <div class="text-right mrg-top-30">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </main>

@endsection
