<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all()->pluck('code', 'id');
        return view('admin.category.index', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $slug = Str::slug($request->name, '-');

        $checkSlug = Category::select('id','slug')->whereSlug($slug)->first();
        if($checkSlug != false){

            $id = Category::select('id')->orderBy('id', 'desc')->first()->toArray();
            $number = $id['id'] + 1 ;
            $slug = $slug.$number;

        }

        if(isset($request['category_image'])){

            $category_image = Helper::upload_image($request->file('category_image'));

        }else{
            $category_image = NULL ;
        }

        $merge_data = array(

            'slug'                  => $slug,
            'category_image'        => $category_image,
        );

        $category = Category::create(array_merge($request->all(), $merge_data ));

        $category->site()->attach($request->input('site_id'));

        return back()->with('success', 'Record has been added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::select('id','name','slug','category_image','page_status')->with('site')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.category.listing', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $record = $category::with('site')->whereId($id)->first();

        $sites = Site::all()->pluck('code', 'id');

        if($record != false){
            return view('admin.category.edit', compact('record', 'sites'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category = Category::find($request['id']);

        $slug = Str::slug($request->name, '-');

        $checkSlug = Category::select('id','slug')->whereSlug($slug)->where('id', '!=' , $request['id'])->first();

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

        $category->update(array_merge($request->all(), $merge_data) );

        if(isset($request['category_image'])){

            $category_image = Helper::upload_image($request->file('category_image'));

            $data = array(
                'category_image'        => $category_image,
            );

            $category->update($data);

        }

        $category->site()->sync($request->input('site_id'));

        return redirect(route('admin.category.listing'))->with('success', 'Record has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail(request()->id);

        $category->site()->detach();
        $category->delete();
        return back()->with('success', 'Record has been deleted successfully.');
    }
}
