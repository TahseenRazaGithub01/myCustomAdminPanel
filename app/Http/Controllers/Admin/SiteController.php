<?php

namespace App\Http\Controllers\Admin;

use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SiteRequest;
use App\Http\Requests\SiteUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {

        if (Site::where('code', '=', Input::get('code'))->exists()) {
           return back()->with('failed', 'Record already exists.');
        }

        if(isset($request['logo'])){

            $logo = Helper::upload_image($request->file('logo'));

        }else{
            $logo = NULL ;
        }

        if(isset($request['flag'])){

            $flag = Helper::upload_image($request->file('flag'));

        }else{
            $flag = NULL ;
        }

        $merge_data = array(
            'logo'      => $logo,
            'flag'      => $flag,
        );

        Site::create(array_merge($request->all(), $merge_data ));

        return back()->with('success', 'Record has been added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        $sites = Site::select('id','code','name','flag')->orderBy('id', 'DESC')->get();

        return view('admin.site.listing', compact('sites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, $id)
    {
        $record = $site::whereId($id)->first();

        if($record != false){
            return view('admin.site.edit', compact('record'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(SiteUpdateRequest $request, Site $site)
    {
        $site = Site::find($request['id']);

        $merge_data = array(

            'code'                         => $request['code'],
            'name'                         => $request['name'],

        );

        //$site->update($merge_data);

        $site->update(array_merge($request->all(), $merge_data) );

        if(isset($request['logo'])){

            $logo = Helper::upload_image($request->file('logo'));

            $data = array(
                'logo'        => $logo,
            );

            $site->update($data);

        }

        if(isset($request['flag'])){

            $flag = Helper::upload_image($request->file('flag'));

            $flag_data = array(
                'flag'        => $flag,
            );

            $site->update($flag_data);

        } 

        return redirect(route('admin.site.listing'))->with('success', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        // if( request()->id == 1){
        //     return back()->with('failed', 'You donot have remove permission of this record.');
        // }

        $detail = Site::findOrFail(request()->id);
        $detail->delete();
        return back()->with('success', 'Record has been deleted successfully.');
    }
}
