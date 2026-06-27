<?php
 
namespace App\Http\Controllers;
 
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
 
class AboutController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::where('is_active', true)->latest()->first();
        return view('about', compact('profile'));
    }
}
