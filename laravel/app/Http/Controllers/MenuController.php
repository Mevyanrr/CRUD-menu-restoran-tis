<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // GET /api/menu — Ambil semua menu
    public function index()
    {
        $menus = Menu::all();

        return response()->json([
            'success' => true,
            'data'    => $menus,
        ]);
    }

    // GET /api/menu/{id} — Ambil 1 menu
    public function show($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
<<<<<<< HEAD
                'success' => false,
                'message' => 'Menu tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $menu,
        ]);
    }

    // POST /api/menu — Tambah menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $namaFile = $request->file('gambar')->store('menus', 'public');
        }

        $menu = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $namaFile,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil ditambahkan',
            'data'    => $menu,
        ], 201);
    }

    // PUT/PATCH /api/menu/{id} — Update menu
=======
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
>>>>>>> oza
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
<<<<<<< HEAD
                'success' => false,
                'message' => 'Menu tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'nama_menu' => 'sometimes|string|max:255',
            'harga'     => 'sometimes|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar baru jika ada, hapus gambar lama
        if ($request->hasFile('gambar')) {
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $menu->gambar = $request->file('gambar')->store('menus', 'public');
        }

        $menu->nama_menu = $request->nama_menu ?? $menu->nama_menu;
        $menu->harga     = $request->harga     ?? $menu->harga;
        $menu->deskripsi = $request->deskripsi ?? $menu->deskripsi;
        $menu->save();

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil diupdate',
            'data'    => $menu,
        ]);
    }

    // DELETE /api/menu/{id} — Hapus menu
=======
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
>>>>>>> oza
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
<<<<<<< HEAD
                'success' => false,
                'message' => 'Menu tidak ditemukan',
            ], 404);
        }

        // Hapus gambar dari storage jika ada
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil dihapus',
        ]);
    }
}
=======
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $menu->delete();

        return response()->json([
            'message' => 'Menu berhasil dihapus'
        ]);
    }
}
>>>>>>> oza
