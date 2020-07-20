@extends('layouts.admin')

@section('content')
         
          <main class='main-content bgc-grey-100'>
          <div id='mainContent'>

            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Subscriber Listing</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>Page URL</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Email</th>
                            <th>Page URL</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        @foreach($subscriber as $list)
                          <tr>
                            <td>{{ $list['email'] }}</td>
                            <td><a target="_blank" href="{{ $list['page_url'] }}">{{ $list['page_url'] }}</a></td>
                            <td>{{ $list['latitude'] }}</td>
                            <td>{{ $list['longitude'] }}</td>
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
