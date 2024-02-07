<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required',
            'phone'    => 'required'
        ]);

        Post::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required',
            'phone'    => 'required'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('name')) {
            $post->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone
            ]);

        } else {
            $post->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone
            ]);
        }


        return redirect()->route('posts.index')->with(['success' => 'Data Telah Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}