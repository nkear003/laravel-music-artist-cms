<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.home');
    }
    
    public function about() {
        $first = 'Nick';
        $last = 'Kearney';
        $fullname = $first . " " . $last;
        $email = 'nkearney757@gmail.com';
        
        /*class Person {
            
            new array(
            'first'
            );
            
            $first;
            $last;
            $fullname = $first . $last;
            $email;
        }*/
        
        $data = (object) array();
        $data->name = 'Nick';  
        $data->email = $email;
        $data->fullname = $fullname;
        
        return view ('pages.about')->withData($data);
    }
    
    public function contact() {
     
        
        
    }
    
    public function news() {
        return view('pages.news');
    }
}
