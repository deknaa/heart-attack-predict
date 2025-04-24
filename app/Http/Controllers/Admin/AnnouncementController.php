<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('admin.announcement.view', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:5',
            'visibility' => 'required|in:public,private',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'visibility' => $request->visibility,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
        ]);

        return redirect()->route('announcement.index')->with('success', 'Announcement created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        return view('admin.announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        return view('admin.announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:5',
            'visibility' => 'required|in:public,private',
        ]);

        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
            'visibility' => $request->visibility,
        ]);

        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully');
    }

    public function list(Request $request)
    {
        $query = Announcement::query()->where('visibility', 'public');

        // Sorting
        if ($request->sort == 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc'); // default: terbaru
        }

        $announcements = $query->paginate(3)->withQueryString();

        return view('user.announcement.show', compact('announcements'));
    }

    public function detail(string $slug)
    {
        $announcements = Announcement::where('slug', $slug)->firstOrFail();
        return view('user.announcement.detail', compact('announcements'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $announcements = Announcement::where('visibility', 'public')
        ->when($search, function($q) use ($search) {
            $q->where(function($sub) use ($search) {
                $sub->where('title', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%");
            });
        })
        ->latest()
        ->paginate(3);

        return view('user.announcement._list', compact('announcements', 'search'));
    }
}
