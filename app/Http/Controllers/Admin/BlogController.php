<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all()->pluck('code', 'id');
        return view('admin.blog.index', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        $slug = Str::slug($request->name, '-');

        $checkSlug = Blog::select('id','slug')->whereSlug($slug)->first();
        if($checkSlug != false){

            $id = Blog::select('id')->orderBy('id', 'desc')->first()->toArray();
            $number = $id['id'] + 1 ;
            $slug = $slug.$number;

        }

        if(isset($request['blog_image'])){

            $blog_image = Helper::upload_image($request->file('blog_image'));

        }else{
            $blog_image = NULL ;
        }

         $merge_data = array(

            'slug'                  => $slug,
            'blog_image'            => $blog_image,
        );

        $blog = Blog::create(array_merge($request->all(), $merge_data ));

        $blog->site()->attach($request->input('site_id'));

        return back()->with('success', 'Record has been added successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::select('id','name','slug','blog_image','page_status')->with('site')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.blog.listing', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, $id)
    {
        $record = $blog::with('site')->whereId($id)->first();

        $sites = Site::all()->pluck('code', 'id');

        if($record != false){
            return view('admin.blog.edit', compact('record', 'sites'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog = Blog::find($request['id']);

        $slug = Str::slug($request->name, '-');

        $checkSlug = Blog::select('id','slug')->whereSlug($slug)->where('id', '!=' , $request['id'])->first();

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

        $trending = (isset($request->trending) ? $request->trending : 0 );
        $latest = (isset($request->latest) ? $request->latest : 0 );

        $merge_data = array(

            'slug'                      => $slug,
            'page_status'               => $request['page_status'],
            'trending'                  => $trending,
            'latest'                    => $latest,

        );

        $blog->update(array_merge($request->all(), $merge_data) );

        if(isset($request['blog_image'])){

            $blog_image = Helper::upload_image($request->file('blog_image'));

            $data = array(
                'blog_image'        => $blog_image,
            );

            $blog->update($data);

        }

        $blog->site()->sync($request->input('site_id'));

        return redirect(route('admin.blog.listing'))->with('success', 'Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::findOrFail(request()->id);

        $blog->site()->detach();
        $blog->delete();
        return back()->with('success', 'Record has been deleted successfully.');
    }
}
