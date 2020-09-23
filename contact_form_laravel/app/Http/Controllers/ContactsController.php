<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Post;

class ContactsController extends Controller
{
    public function input(){
      return view('input');
    }
}
