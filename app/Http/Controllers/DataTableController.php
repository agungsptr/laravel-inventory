<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use App\User;

class DataTableController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function getUser()
    // {
    //     return datatables()->of(User::all())
    //         ->addColumn('aksi', function ($user) {
    //             return '<a href="' . route('user.edit', ['user' => $user->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
    //                 . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('user.destroy', ['user' => $user->id]) . '">Delete</button>';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->toJson();
    // }

    public function getCategory()
    {
        return datatables()->of(Category::all())
            ->addColumn('aksi', function ($category) {
                return '<a href="' . route('category.edit', ['category' => $category->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
                    . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('category.destroy', ['category' => $category->id]) . '">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    // public function getPost()
    // {
    //     return datatables()->of(Content::all())
    //         ->addColumn('user', function ($post) {
    //             return $post->user();
    //         })
    //         ->addColumn('category', function ($post) {
    //             return $post->category();
    //         })
    //         ->addColumn('aksi', function ($post) {
    //             return '<a href="' . route('post.edit', ['post' => $post->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
    //                 . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('post.destroy', ['post' => $post->id]) . '">Delete</button>';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->toJson();
    // }

    // public function getGallery()
    // {
    //     return datatables()->of(Gallery::all())
    //         ->addColumn('file_photo', function ($gallery) {
    //             $photo = 'storage/' . $gallery->photo;
    //             $img = '<a href="' . asset($photo) . '"><img src="' . asset($photo) . '" width="100px"></a>';
    //             return $img;
    //         })
    //         ->addColumn('aksi', function ($gallery) {
    //             return '<a href="' . route('gallery.edit', ['gallery' => $gallery->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
    //                 . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('gallery.destroy', ['gallery' => $gallery->id]) . '">Delete</button>';
    //         })
    //         ->rawColumns(['aksi', 'file_photo'])
    //         ->toJson();
    // }
}
