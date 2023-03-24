<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='posts';
    protected $fillable=[
        'title',
        'description',
        'content',
        'image',
        'view_counts',
        'user_id',
        'new_post',
        'slug',
        'category_id',
        'hightlight_post',
        ];
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
        public function category(){
            return $this->belongsTo(Categogy::class,'category_id','id');
        }
        public function comment(){
            return $this-> hasMany(Comment::class);
        }

        public function imageUrl(){
            return '/image/post/'.$this->image;
        }
}
