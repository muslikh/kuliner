<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $categories = Category::query();

            return datatables()->of($categories)
            // ->addColumn('action',function() {
            //     return '<a href="#">Edit</a>';
            // })
            ->addColumn('action', 'categories.dt-action')
            ->toJson();
        }
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        session()->flash('success','Berhasil Menambahkan Kategori');

        // return redirect()->route('category.index')->with('success','Berhasil Menambahkan Kategori');
        return redirect()->route('category.index')->withSuccess('Berhasil Menambahkan Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate($request,[
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('category.index')->withInfo('Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // dd($category);

        session()->flash('error','Data Di hapus');

        if($category->delete()) {

            return response()->json([
                'success' => true,
            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }
}
