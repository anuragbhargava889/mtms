<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gbrock\Table\Facades\Table;
use App\Region;

class RegionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Region::sorted()->paginate(10);
        $table = Table::create($region, ['name', 'status']);
        $table->setView('vendor.gbrock.table', ['class' => 'table table-striped table-hover']);
        $table->addColumn('Action', 'Action', function($region) {
            return '<a href="'.route('regions.edit', $region->id).'">Edit</a>';
        });
        return view('region.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:region',
            'status' => 'required',
        ]);

        $region = new Region();
        $region->name = $request->Input(['name']);
        $region->status = $request->Input(['status']);
        $region->save();
        return redirect('regions');
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
    public function edit($id)
    {
        return view('region.edit', ['region' => Region::find($id)]);
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
        $this->validate($request, [
            'name' => "required|unique:region,name,".$id,
            'status' => 'required',
        ]);

        $region = Region::find($id);
        $region->name = $request->Input(['name']);
        $region->status = $request->Input(['status']);
        $region->save();
        return redirect('regions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
