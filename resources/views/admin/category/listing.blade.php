@extends('layouts.admin')

@section('content')
          <main class='main-content bgc-grey-100'>
          <div id='mainContent'>

        @if(session('success'))
		      <div class="alert alert-success alert-dismissable custom-success-box">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        {{ session('success') }}
		      </div> 
		    @endif

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Category Listing</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Site</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Category Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Site</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Category Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        @foreach($category as $detail)
                          <tr>
                            <td>{{ isset($detail['site'][0]['code']) ? $detail['site'][0]['code'] : '' }}</td>
                            <td>{{ $detail['name'] }}</td>
                            <td>{{ $detail['slug'] }}</td>
							             <td><img src="{{ url('/thumbnail/') }}/{{ $detail['category_image'] }}" width="60px;" height="60px;"></td>
                            <?php $status = (isset($detail['page_status']) && $detail['page_status'] == 1 ) ? "Active" : "Inactive" ; ?>
							             <td>{{ $status }}</td>
                            <td><a href="{{ url('admin/category/edit') }}/{{ $detail['id'] }}" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></a> |
                            	<a href="{{ url('admin/category/delete') }}/{{ $detail['id'] }}" title="Remove" onclick="return confirm('you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

@endsection
