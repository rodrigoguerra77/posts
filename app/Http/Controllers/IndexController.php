<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show posts
        $data['posts']=Posts::where ('status', '=', 'Publicado')
        ->orderBy('publication_date', 'desc')
        ->get();
        
        return view('welcome', $data);
    }

}
