<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //  
    public function index()
    {
        $categories = Categorie::all();
        return view('HR.Accounting.Categories.index', [
            'categories' => $categories
        ]);
    }

    public function dataCategories()
    {
        $categories = Categorie::all();
        return $categories;
    }

    public function insertCategories(Request $request)
    {
        $data = $request->all();
        $categories = new Categorie($data);
        $categories->save();

        $status = 400;
        $message = "Gagal menyimpan data-Revenues!";

        if ($categories) {
            $status = 200;
            $message = "Berhasil menyimpan data-Revenues!";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $categories
        ]);
    }

    public function editCategories($id)
    {
        $categories = Categorie::find($id);
        return $categories;
    }

    public function updateCategories(Request $request, $id)
    {
        $categories = Categorie::find($id);
        $categories->update($request->all());
        $categories->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $categories]);
    }

    public function deleteCategories($id)
    {
        $categories = Categorie::find($id)->delete();
        return response()->json($categories);
    }
}
