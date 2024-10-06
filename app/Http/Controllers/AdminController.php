<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('admin.dashboard');
    }
    public function title()
    {
        return view('admin.title');
    }

    public function add_content(Request $request)
{
    $content = new Content();
    $content->content = $request->content;
    $content->save();

    // Flash success message to session
    return redirect()->back()->with('success', 'Content Added successfully');
}

}
