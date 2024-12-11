<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $newsCount = News::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('backend.dashboard', ['news_count' => $newsCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
    }

}
