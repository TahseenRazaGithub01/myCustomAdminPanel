<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
    	'code',
		'name',
		'logo',
		'flag',
		'footer_about_text',
		'footer_text',
		'footer_email',
		'facebook_link',
		'linkedin_link',
		'youtube_link',
		'google_plus_link',
    ];
}
