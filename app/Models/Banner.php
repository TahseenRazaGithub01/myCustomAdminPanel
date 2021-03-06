<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
    	'name',
		'banner_image',
		'short_description',
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
