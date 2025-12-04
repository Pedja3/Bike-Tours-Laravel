<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;

class CommentController extends Controller
{
    public function store(Request $request, Tour $tour)
    {
        $request->validate([
            'body' => 'required|string|min:3|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);
        $tour->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->body,
            'rating' => $request->rating,
        ]);
        return redirect()->back();
    }
}
