<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Viewable;
class Blog extends Model
{
    // use Sortable;


    protected $table = 'blogs';

    protected $fillable = ['title','description','content','view','image','category_id','user_id'];


    public function categories(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
