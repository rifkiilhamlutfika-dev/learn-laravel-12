<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = DB::table('categories')->get();
        // $category = DB::table('categories')->select(['id', 'name', 'slug'])->get();
        // $category = DB::table('categories')->whereIn('id', [1, 2, 3])->get();
        // $category = DB::table('categories')->where('id', 1)->get();
        // $category = DB::table('categories')->where('id', 1)->select(['id', 'name', 'slug'])->first();

        // $category = Category::all();
        // $category = Category::select(['id', 'name', 'created_at'])->get();
        // $category = Category::whereIn('id', [1, 4, 5])
        //     ->select(['id', 'name', 'created_at'])
        //     ->get();

        // $category = Category::where('id', 1)->first();

        $category = Category::all();
        return $category;
    }

    public function store(Request $request)
    {
        // $category = DB::table('categories')->insert([
        //     'name' => $request['name'],
        //     'slug' => Str::of($request['name'])->slug('-'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // $category = DB::table('categories')->insert([
        //     [
        //         'name' => "Komedi",
        //         'slug' => Str::of('Komedi')->slug('-'),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => "Ayeee",
        //         'slug' => Str::of('Ayeee')->slug('-'),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => "walaw we",
        //         'slug' => Str::of('walaw we')->slug('-'),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);

        // $category = new Category();
        // $category->name = $request['name'];
        // $category->slug = Str::of($request['name'])->slug('-');
        // $category->save();


        // $category = Category::create([
        //     'name' => $request['name'],
        //     'slug' => Str::of($request['name'])->slug('-')
        // ]);

        $category = Category::insert([
            [
                'name' => "Komedi ya kan",
                'slug' => Str::of('Komedi ya kan')->slug('-'),
            ],
            [
                'name' => "Ayeee broo",
                'slug' => Str::of('Ayeee broo')->slug('-'),
            ],
            [
                'name' => "walaw we strike",
                'slug' => Str::of('walaw we strike')->slug('-'),
            ]
        ]);

        return $category;
    }

    public function update(Request $request, $id)
    {
        // $category = DB::table('categories')->where('id', $id)->update([
        //     'name' => $request['name'],
        //     'slug' => Str::of($request['name'])->slug('-'),
        //     'updated_at' => now()
        // ]);

        // $category = Category::find($id);
        // $category = Category::findOrFail($id);

        // if ($category) {
        //     $category->name = $request['name'];
        //     $category->slug = Str::of($request['name'])->slug('-');
        //     $category->save();
        // }

        $category = Category::where('id', $id)
            ->update([
                'name' => $request['name'],
                'slug' => Str::of($request['name'])->slug('-'),
                'updated_at' => now()
            ]);

        return $category;
    }

    public function destroy($id)
    {
        // DB::table('categories')->where('id', $id)->delete();

        // $category = Category::find($id);
        // if ($category) {
        //     $category->delete();
        // }

        Category::destroy($id);

        return true;
    }
}
