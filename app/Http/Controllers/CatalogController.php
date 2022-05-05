<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\catalogs;
use App\Models\mgroups;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;

class CatalogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    //    $this->middleware('admin')->only('destroy');   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //metal=1 золото
    {
        $search = $request->search;
        if ($request->search) {
            $catalogs = DB::table('catalogs')
                ->where('catalogs.articul', 'LIKE', $request->search . '%')
                //  ->orWhere('catalogs.name','like','%'.$request->search.'%')
                ->leftJoin('mgroups', 'catalogs.mgroup_id', '=', 'mgroups.id')
                ->leftJoin('features', 'catalogs.metal', '=', 'features.id')
                ->select('catalogs.*', 'mgroups.name as mgroup_name', 'features.name as features_name')
                ->get();
            return view('catalog.index', compact('catalogs', 'search'));
        }

        $metal = $request->input('metal') ?? 1;
        $mgroup = mgroups::where('id', $request->mgroup_id)->first();

        $catalogs = DB::table('catalogs')
            ->where('mgroup_id', '=', $mgroup->id)
            ->where('metal', '=', $metal)
            ->leftJoin('mgroups', 'catalogs.mgroup_id', '=', 'mgroups.id')
            ->leftJoin('features', 'catalogs.metal', '=', 'features.id')
            ->select('catalogs.*', 'mgroups.name as mgroup_name', 'features.name as features_name')
            //->paginate(15);
            ->get();
        return view('catalog.index', compact('catalogs', 'mgroup', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mgroups = mgroups::all();
        $element = new stdClass();

        return view('catalog.create', compact('element', 'mgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogRequest $request)
    {

        $catalog =  new catalogs();

        //       $table->timestamps();
        $catalog->id1c = $request->id1c;
        $catalog->articul = $request->articul;
        $catalog->size = 1;
        $catalog->mgroup_id = $request->mgroup_id;
        $catalog->specifications = 1;
        $catalog->metal = $request->metal;
        $catalog->trymetal = $request->trymetal;
        $catalog->descr = $request->descr;

        $catalog->name = $request->name;
        $catalog->fullname = $request->name;
        $catalog->balance = 1;
        $catalog->img = "no-image.png";

        if ($file = $request->file('img')) {
            //$filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $store_path = $request->mgroup_id . '/' . $catalog->metal . '/1'; //1 это для совместимости
            $store_name = $request->articul . '.' . $extension;
            $fullpath = storage_path('app/media/') . $store_path;
            if (!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
            }
            //   file_put_contents($fullpath.'/'.$store_name,$request->file('img'));
            //   php artisan storage:link   
            Storage::disk('public')->putFileAs('media/' . $store_path, $request->file('img'), $store_name);
            $catalog->img = $store_path . '/' . $store_name;
        }
        $catalog->save();

        return redirect(route('catalog.show', $catalog->id))->with('success', 'Изделие успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element_catalog = DB::table('catalogs')
            ->where('catalogs.id', '=', $id)
            ->leftJoin('mgroups', 'catalogs.mgroup_id', '=', 'mgroups.id')
            ->leftJoin('features', 'catalogs.metal', '=', 'features.id')
            ->select('catalogs.*', 'mgroups.name as mgroup_name', 'features.name as metal_name')
            ->first();
        //->get();
        return view('catalog.show', compact('element_catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mgroups = mgroups::all();

        $element = DB::table('catalogs')
            ->where('catalogs.id', '=', $id)
            ->leftJoin('mgroups', 'catalogs.mgroup_id', '=', 'mgroups.id')
            ->leftJoin('features', 'catalogs.metal', '=', 'features.id')
            ->select('catalogs.*', 'mgroups.name as mgroup_name', 'features.name as metal_name')
            ->first();
        return view('catalog.edit', compact('element', 'mgroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogRequest $request, $id)
    {
        $el_db =  catalogs::where('id', $id)->first();

        $el_db->id1c = $request->id1c;
        $el_db->articul = $request->articul;
        $el_db->size = 1;
        $el_db->mgroup_id = $request->mgroup_id;
        $el_db->specifications = 1;
        $el_db->metal = $request->metal;
        $el_db->trymetal = $request->trymetal;
        $el_db->descr = $request->descr;
        $el_db->name = $request->name;
        $el_db->fullname = $request->name;
        $el_db->balance = 1;
        if ($file = $request->file('img')) {
            $extension = $file->getClientOriginalExtension();
            $store_path = $request->mgroup_id . '/' . $el_db->metal . '/1';
            $store_name = $request->articul . '.' . $extension;
            $fullpath = storage_path('app/media/') . $store_path;
            if (!is_dir($fullpath)) {
                mkdir($fullpath, 0777, true);
            }
            Storage::disk('public')->putFileAs('media/' . $store_path, $request->file('img'), $store_name);
            $el_db->img = $store_path . '/' . $store_name;
        }
        $el_db->update();
        return redirect(route('catalog.show', $el_db->id))->with('success', 'Изделие успешно обновленно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $el_db =  catalogs::where('id', $id)->first();
        $el_db->delete();
        return redirect(route('catalog.index', ['mgroup_id' => $el_db->mgroup_id]))->with('success', 'Изделие успешно удалено');
    }
}
