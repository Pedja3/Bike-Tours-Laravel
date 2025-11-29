<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'byDifficulty']);
    }
    
    public function index(Request $request)
    {
        $difficulty = $request->query('difficulty');
        $search = $request->query('search');

        $query = Tour::with('user')->latest();

        if ($difficulty && in_array($difficulty, ['easy', 'medium', 'hard'])) {
            $query->where('difficulty', $difficulty);
        }

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $tours = $query->latest()->simplePaginate(5)->withQueryString();

        return view('tours.index', [
            'tours' => $tours,
            'difficulty' => $difficulty,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('tours.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'difficulty' => 'required|in:easy,medium,hard',
            'distance' => 'required|numeric|min:0',
            'location' => 'required|string|max:255'
        ]);

        Tour::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'difficulty' => $validated['difficulty'],
            'distance' => $validated['distance'],
            'location' => $validated['location'],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('tours.index');
    }

    public function show(Tour $tour)
    {
        return view('tours.show', [
            'tour' => $tour
        ]);
    }

    public function edit(Tour $tour)
    {
        return view('tours.edit', [
            'tour' => $tour
        ]);
    }

    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string|max:255',
            'difficulty' => 'required|in:easy,medium,hard',
            'distance' => 'required|numeric|min:0',
            'location' => 'required|string|max:255'
        ]);

        $tour->update($validated);

        return redirect()->route('tours.index');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('tours.index');
    }

    public function byDifficulty($difficulty)
    {
        $tours = Tour::where('difficulty', $difficulty)->latest()->paginate(6)->withQueryString();

        return view('tours.index', [
            'tours' => $tours,
            'selectedDifficulty' => $difficulty
        ]);
    }
}
