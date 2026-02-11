<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = JobOffer::with('category')->latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where(
                    'title',
                    'like',
                    '%'.$request->search.'%',
                )->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%'.$request->location.'%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $jobs = $query->paginate(10)->withQueryString();

        return view('jobs.index', compact('jobs', 'categories'));
    }

    public function show(JobOffer $job)
    {
        return view('jobs.show', compact('job'));
    }
}
