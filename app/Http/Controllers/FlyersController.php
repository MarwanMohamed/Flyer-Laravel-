<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use App\Flyer;


class FlyersController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        parent::__construct();
    }

	public function create()
    {
    	return view('flyers.create');
    }    

    public function store(FlyerRequest $request)
    {
    	Flyer::create($request->all());

    	\Session::flash('message', 'Flyer has been Created Successfuly');

    	return redirect()->back();
    }

    public function show($zip, $street) {
    	$flyer = Flyer::LocatedAt($zip, $street);
    	return view('flyers.show')->withFlyer($flyer);
    }

    public function addPhoto($zip, $street, Request $request) {

        $this->validate($request, [
            'photo' => 'required|mimes:jpeg,bmp,png'
        ]);
        $flyer = Flyer::LocatedAt($zip, $street);
        $photo = $this->makePhoto($request->file('photo'));
        $flyer->addPhoto($photo);
    }

    protected function makePhoto(UploadedFile $file) {
       return Photo::named($file->getClientOriginalName())->move($file);
    }


}
