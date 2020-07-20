<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Session;
use App\Helpers\helper as Helper;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Helper::check_lang();
        Helper::site_id();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $site_id = Session::get('site_id');
        
        $pages = Page::CustomWhereBasedData($site_id)->get()->toArray();

        // dd( $pages );

        return view('testing', compact('stories','pages'));
    }
    
    // public function show(Request $request,$locale)
    // {
    //     app()->setLocale($locale);

    //     echo trans('sentence.home');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
