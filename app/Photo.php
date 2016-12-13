<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Image;


class Photo extends Model
{	
	protected $table = 'flyers_photos';
	protected $fillable = ['path','name','thumbnail_path'];
	protected $baseDir = 'images';

    public function flyer () {
    	return $this->belongsTo('App\Flyer');
    }

    public static function named($name) {
        return (new static())->saveAs($name);
    }


    protected function saveAs($name) {

        $this->name = sprintf("%s-%s", rand(1, 99999), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);
        return $this;
    }
   

    public function move(UploadedFile $file) {
        $file->move($this->baseDir , $this->name);
        $this->makeThumbnail();
        return $this;
    }

    protected function makeThumbnail() {
        Image::make($this->path)
        ->fit(200)
        ->save($this->thumbnail_path);

        return $this;
    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);
        parent::delete();
    }

}

