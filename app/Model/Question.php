<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Reply;
use App\User;

class Question extends Model
{	

    protected $fillable = ['title','slug','body','category_id','user_id'];

    // protected $guarded = [];

    protected $with = ['replies'];

    
    //-> for changing route key
	// public function getRouteKeyName(){
	// 	return 'slug';
	// }
    
    //-> For making new property in the table that not exits in the database.
    public function getPathAttribute(){
        return asset("api/question/$this->slug");
        // return "question/$this->slug";
    }


    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Reply::class)->latest();
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
