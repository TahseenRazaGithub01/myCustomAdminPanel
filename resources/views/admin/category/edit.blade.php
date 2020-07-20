@extends('layouts.admin')

@section('css')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection

@section('content')
		<!-- ### Edit Orphan Page ### -->
		<main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="full-container">
              <div class="email-app">
              <div class="email-side-nav remain-height ov-h">
                <div class="h-100 layers">
                  <div class="p-20 bgc-grey-100 layer w-100">
                    <a href="{{ route('admin.category.listing') }}" class="btn btn-danger btn-block">View Category Listing</a>
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
                    <form method="post" action="{{ route('admin.category.update') }}" enctype="multipart/form-data" class="email-compose-body">
                      @csrf
                      
                      <input type="hidden" name="id" value="{{ $record->id }}">
                      <h4 class="c-grey-900 mB-20">Update Category</h4>
                      <div class="send-header">


                        <div class="form-group">
                          <label for="inputState">Site</label>
                          <select id="inputState" required="required" name="site_id" class="form-control">
                          @foreach($sites as $id => $code)

                            @if(isset($record->site))

                              @foreach($record->site as $cat)

                                <option value="{{ $id }}" <?php if($cat->id == $id){ echo "selected"; } ?> >{{ $code }}</option>

                              @endforeach

                            @endif
                            
                          @endforeach
                          </select>
                        </div>

                        
                        <div class="form-group">
                          <input type="text" required="required" class='form-control' name="name" value="{{ $record->name }}" placeholder="Name">
                        </div>

                        <div class="form-group">
                          <input type="file" class="form-control" id="category_image" name="category_image"
                          aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Upload Category Image</label>
                        </div>

                        <div class="form-group">
                          <img src="{{ url('/thumbnail/') }}/{{ $record->category_image }}" width="100px;" height="100px;"></td>
                        </div>
                        <hr>

                        <div class="form-group">
                        <input type="text" required="required" class='form-control' name="short_description" value="{{ $record->short_description }}" placeholder="Short Description Like Page Small Description ...">
                        </div>
						
					         </div>
					  
					         <div id="compose-area"></div>

                      <!-- ckEditor -->
                      <div class="form-group">
                          <textarea name="long_description" class="form-control" placeholder="Description..." rows='10'>{{ $record->long_description }}</textarea>
                        </div>
                      <!-- ckEditor -->
	
                      <hr>
                      <h3> Seo Section </h3>

                      <div class="form-group">
                        <input type="text" class='form-control' name="meta_title" value="{{ $record->meta_title }}" placeholder="Meta Title">
                      </div>
                      <div class="form-group">
                        <input type="text" class='form-control' name="meta_keyword" value="{{ $record->meta_keyword }}" placeholder="Meta Keyword">
                      </div>
                      <div class="form-group">
                        <input type="text" class='form-control' name="meta_description" value="{{ $record->meta_description }}" placeholder="Meta Description">
                      </div>
					  
					           <label class="switch">
                          <input type="checkbox" name="page_status" <?php if($record->page_status == 1){ echo 'checked'; } ?> >
                          <span class="slider round"></span>
                      </label>


                      <div class="text-right mrg-top-30">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                    </form>
                  
                </div>
              </div>
              </div>
            </div>
          </div>
        </main>

@endsection

@section('js')
<script src="{{ url('assets/js/jquery-min.js') }}" type="text/javascript"></script>

<script src="http://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace( 'long_description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection