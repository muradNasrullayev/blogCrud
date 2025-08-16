<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Blogs\StoreRequest;
use App\Http\Requests\Blogs\UpdateRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogQuery = Blog::query();

        if ($request->has('search')) {
            $blogQuery->where('title', "Like", "%{$request->get('search')}%");
        }

        if ($request->has('from_date')) {
            $blogQuery->whereDate('created_at', '>=', $request->get('from_date'));
        }

        if ($request->has('to_date')) {
            $blogQuery->whereDate('created_at', '<=', $request->get('to_date'));
        }

        $blogs = $blogQuery->orderByDesc('created_at')->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ];

        $file = $request->file('image');
        $fileName = time() . $file->getClientOriginalName();
        $file->move(storage_path('app/public/blogs'), $fileName);
        $data['image'] = '/blogs/' . $fileName; ;

        Blog::query()->create($data);
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ];

        $file = $request->file('image');

        if (!empty($file)) {
            if ($blog->image && file_exists(public_path('/storage/' . $blog->image))){
                File::delete(public_path('/storage/' . $blog->image));
            }

            $fileName = time() . $file->getClientOriginalName();
            $file->move(storage_path('app/public/blogs'), $fileName);
            $data['image'] = '/blogs/' . $fileName; ;
        }

        $blog->update($data);
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('/storage/' . $blog->image))){
            File::delete(public_path('/storage/' . $blog->image));
        }
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
