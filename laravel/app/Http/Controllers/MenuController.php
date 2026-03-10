<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    // GET /api/menus
    public function index()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }

    // GET /api/menus/{id}
    public function show($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        return response()->json($menu);
    }

    // POST /api/menus
    public function store(Request $request)
    {
        $menu = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar
        ]);

        return response()->json([
            'message' => 'Menu berhasil ditambahkan',
            'data' => $menu
        ], 201);
    }

    // PUT/PATCH /api/menus/{id}
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar
        ]);

        return response()->json([
            'message' => 'Menu berhasil diupdate',
            'data' => $menu
        ]);
    }

    // DELETE /api/menus/{id}
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $menu->delete();

        return response()->json([
            'message' => 'Menu berhasil dihapus'
        ]);
    }
}