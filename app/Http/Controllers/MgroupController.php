<?php

namespace App\Http\Controllers;

use App\Models\mgroups;
use Illuminate\Http\Request;

class MgroupController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mgroups = mgroups::all();
        return view('mgroup.index', compact('mgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = mgroups::find($id);
        return view('mgroup.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = mgroups::find($id);
        return view('mgroup.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element = mgroups::find($id);
        $element->descr = $request->descr;
        $element->name = $request->name;
        
        if ($file = $request->file('img')) {
            $extension = $file->getClientOriginalExtension();
            $store_name = $id . '.' . $extension;
            \Storage::disk('public')->putFileAs('media/', $request->file('img'), $store_name);
            $element->img = $store_name;
        }
        $element->update();
        return redirect(route('mgroup.show', $element->id))->with('success', 'Изделие успешно обновленно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = mgroups::find($id);
        $element->delete();
        return redirect(route('mgroup.index'))->with('success', 'Изделие успешно удалено');
    }
}
