<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home(): string
    {
        return view('home_page');
    }
    
    public function shop(): string
    {
        return view('shop');
    }
    
    public function shopDetail(): string
    {
        return view('shop-detail');
    }
    
    public function contact(): string
    {
        return view('contact');
    }
    
    public function testimonial(): string
    {
        return view('testimonial');
    }
    
    public function error_404(): string
    {
        return view('404');
    }

    public function cart(): string
    {
        return view('cart');
    }

    public function checkout(): string
    {
        return view('checkout');
    }    
}
