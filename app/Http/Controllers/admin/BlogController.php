<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ArrayHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs = Blog::orderBy('id', 'DESC')->paginate(15);

        return view('admin.blog.index',
            compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $writer_statuses = Blog::writer_status;

        $categories = Category::all()->toArray();
        $tags = Tag::all()->toArray();

        $categories = ArrayHelper::map($categories, 'id', 'title');
        $tags = ArrayHelper::map($tags, 'id', 'title');

        return view('admin.blog.create', compact('writer_statuses', 'categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->all();

        $data['writer_id'] = Auth::id();
        $data['checker_status'] = Blog::checker_status['new'];

        $blog = Blog::create($data);

        if (!empty($data['tags']))
            foreach ($data['tags'] as $tag_id) {
                $Tag = new BlogTag();
                $Tag->blog_id = $blog->id;
                $Tag->tag_id = $tag_id;
                $Tag->save();
            }

        return redirect()->route('admin.blog.index')
            ->with('success', 'blog created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('id', $id)->first();

        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->firstOrFail();

        $writer_statuses = Blog::writer_status;

        $categories = Category::all()->toArray();
        $tags = Tag::all()->toArray();

        $categories = ArrayHelper::map($categories, 'id', 'title');
        $tags = ArrayHelper::map($tags, 'id', 'title');

        $blog_tags = BlogTag::where('blog_id', $blog->id)
            ->get()
            ->toArray();

        $blog_tags = ArrayHelper::map($blog_tags, 'blog_id', 'tag_id');

        return view('admin.blog.edit', compact(
            'blog',
            'writer_statuses',
            'categories',
            'tags',
            'blog_tags'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $blog = Blog::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->all();
        $data['writer_id'] = Auth::id();
        $data['checker_status'] = $blog->checker_status;

        $blog->update($data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where('id', $id);

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'blog deleted successfully');

    }
}
