<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all()->pluck('code', 'id');
        return view('admin.banner.index', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        if(isset($request['banner_image'])){

            $banner_image = Helper::upload_image_for_banner($request->file('banner_image'));

        }else{
            $banner_image = NULL ;
        }

        $merge_data = array(

            'banner_image'     => $banner_image,
        );


        $banner = Banner::create(array_merge($request->all(), $merge_data ));

        $banner->site()->attach($request->input('site_id'));

        return back()->with('success', 'Record has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        $banner = Banner::select('id','name','banner_image','short_description')->with('site')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.banner.listing', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner, $id)
    {
        $record = $banner::with('site')->whereId($id)->first();

        $sites = Site::all()->pluck('code', 'id');

        if($record != false){
            return view('admin.banner.edit', compact('record', 'sites'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $banner = Banner::find($request['id']);

        $banner->update($request->all());

        if(isset($request['banner_image'])){

            $banner_image = Helper::upload_image_for_banner($request->file('banner_image'));

            $data = array(
                'banner_image'        => $banner_image,
            );

            $banner->update($data);

        }

        $banner->site()->sync($request->input('site_id'));

        return redirect(route('admin.banner.listing'))->with('success', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner = Banner::findOrFail(request()->id);

        $banner->site()->detach();
        $banner->delete();
        return back()->with('success', 'Record has been deleted successfully.');
    }
}
