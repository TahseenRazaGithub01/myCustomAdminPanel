<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all()->pluck('code', 'id');
        return view('admin.page.index', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $slug = Str::slug($request->name, '-');

        $checkSlug = Page::select('id','slug')->whereSlug($slug)->first();
        if($checkSlug != false){

            $id = Page::select('id')->orderBy('id', 'desc')->first()->toArray();
            $number = $id['id'] + 1 ;
            $slug = $slug.$number;

        }

        if(isset($request['banner_image'])){

            $banner_image = Helper::upload_image_for_banner($request->file('banner_image'));

        }else{
            $banner_image = NULL ;
        }

        $merge_data = array(

            'slug'                  => $slug,
            'banner_image'     => $banner_image,
        );


        $page = Page::create(array_merge($request->all(), $merge_data ));

        $page->site()->attach($request->input('site_id'));

        return back()->with('success', 'Record has been added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $page = Page::select('id','name','slug','banner_image','page_status')->with('site')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.page.listing', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page, $id)
    {
        $record = $page::with('site')->whereId($id)->first();

        $sites = Site::all()->pluck('code', 'id');

        if($record != false){
            return view('admin.page.edit', compact('record', 'sites'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page = Page::find($request['id']);

        $slug = Str::slug($request->name, '-');

        $checkSlug = Page::select('id','slug')->whereSlug($slug)->where('id', '!=' , $request['id'])->first();

        if($checkSlug != false){

            $slug = $slug.$request['id'];

        }

        if(isset($request['page_status'])){

            if($request['page_status'] == "on"){

                $request['page_status'] = 1 ;

            }

        }else{

            $request['page_status'] = 0 ;
        }

        $merge_data = array(

            'slug'                      => $slug,
            'page_status'                => $request['page_status'],

        );

        $page->update(array_merge($request->all(), $merge_data) );

        if(isset($request['banner_image'])){

            $banner_image = Helper::upload_image_for_banner($request->file('banner_image'));

            $data = array(
                'banner_image'        => $banner_image,
            );

            $page->update($data);

        }

        $page->site()->sync($request->input('site_id'));

        return redirect(route('admin.page.listing'))->with('success', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page = Page::findOrFail(request()->id);

        $page->site()->detach();
        $page->delete();
        return back()->with('success', 'Record has been deleted successfully.');
    }
}
