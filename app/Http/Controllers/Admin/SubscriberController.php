<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class SubscriberController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        $subscriber = Subscriber::select('id','email','page_url','latitude','longitude')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.subscriber.listing', compact('subscriber'));
    }

}
