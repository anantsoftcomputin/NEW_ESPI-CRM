<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset=Asset::paginate(5);
        return view('Asset.index',compact('asset'));
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
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|min:10',
            'file' => 'required|mimes:pdf,doc',
        ]);

        $document=New Asset();
        $document->company_id=\Auth::user()->company_id;
        $document->added_by=\Auth::user()->id;
        $document->description=$request->description;
        $document->name=$request->title;
        $path = $request->file('file')->store(
            'documents', 'public'
        );
        $document->file_name="storage/".$path;
        $document->save();

        \Session::flash('info','Document Added Successfully.');



        return redirect(route('Asset.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset=Asset::find($id);
        $asset->delete();
        \Session::flash('warning','Document Deleted Successfully.');
        return redirect(route('Asset.index'));
    }
}
