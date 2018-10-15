<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	/*
    protected $fillable = [
    	'data'
    ];
    */

    protected $casts = [
    	'data' => 'array'
    ];

    public function getFirstImage() {
    	$image = $this->data['images'];
    	$image = reset($image);
    	return $image;
    }

    public function getAllImages() {
        $images = $this->data['images'];
        $images = array_keys($images);

        return $images;
    }
}
