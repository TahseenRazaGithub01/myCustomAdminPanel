<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    	'name',
		'slug',
		'blog_image',
		'short_description',
		'long_description',
		'trending',
		'latest',
		'meta_title',
		'meta_keyword',
		'meta_description',
		'page_status',
    ];
	
	public function scopeCustomWhereBasedData($query,$siteid=null) {
		return $query
			->with(['site' => function($siteQuery){
                $siteQuery->select(['id','name','code']);
            }])
            ->whereHas('site', function($q) use ($siteid){
            $q->where('site_id',$siteid);
            });
	}


    public function site()
    {
        return $this->belongsToMany(Site::class);
    }
}
