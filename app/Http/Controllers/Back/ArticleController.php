<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel.
     */
    public function index()
    {
        if (request()->ajax()) {
            // Memulai query dasar
            $query = Article::with('Category')->latest();

            // DIUBAH: Periksa apakah role user BUKAN 1 (admin)
            if (Auth::user()->role != 1) {
                // Jika bukan admin, hanya tampilkan artikel milik user yang sedang login
                $query->where('user_id', Auth::id());
            }

            $articles = $query->get();

            return DataTables::of($articles)
                ->addIndexColumn()
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function ($article) {
                    return '<div class="text-center">
                                <a href="'.url('article/'.$article->id).'" class="btn btn-secondary">Detail</a>
                                <a href="'.url('article/'.$article->id.'/edit').'" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }
        return view('back.article.index');
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Menyimpan artikel baru ke dalam database.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('back', $fileName, 'public');

        $data['user_id'] = auth()->user()->id;
        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('article'))->with('success', 'Data artikel berhasil dibuat');
    }

    /**
     * Menampilkan detail artikel.
     */
    public function show(string $id)
    {
        $article = Article::with(['User', 'Category'])->findOrFail($id);

        // DIUBAH: Izinkan jika role user adalah 1 (admin) ATAU user adalah pemilik artikel
        if (Auth::user()->role != 1 && $article->user_id !== Auth::id()) {
            abort(403, 'AKSI INI TIDAK DIIZINKAN.');
        }

        return view('back.article.show', ['article' => $article]);
    }

    /**
     * Menampilkan form untuk mengedit artikel.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        // DIUBAH: Izinkan jika role user adalah 1 (admin) ATAU user adalah pemilik artikel
        if (Auth::user()->role != 1 && $article->user_id !== Auth::id()) {
            abort(403, 'AKSI INI TIDAK DIIZINKAN.');
        }

        return view('back.article.update', [
            'article'    => $article,
            'categories' => Category::get()
        ]);
    }

    /**
     * Memperbarui artikel di dalam database.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        // DIUBAH: Izinkan jika role user adalah 1 (admin) ATAU user adalah pemilik artikel
        if (Auth::user()->role != 1 && $article->user_id !== Auth::id()) {
            abort(403, 'AKSI INI TIDAK DIIZINKAN.');
        }

        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('back', $fileName, 'public');
            Storage::delete('public/back/'.$request->oldImg);
            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);
        $article->update($data);

        return redirect(url('article'))->with('success', 'Data artikel berhasil diperbarui');
    }

    /**
     * Menghapus artikel dari database.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        // DIUBAH: Izinkan jika role user adalah 1 (admin) ATAU user adalah pemilik artikel
        if (Auth::user()->role != 1 && $article->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Aksi tidak diizinkan.'
            ], 403);
        }

        Storage::delete('public/back/' . $article->img);
        $article->delete();

        return response()->json([
            'message' => 'Data artikel telah dihapus'
        ]);
    }
}