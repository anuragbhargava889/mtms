<?php

namespace App\Http\Controllers;

use Gbrock\Table\Facades\Table;
use Illuminate\Http\Request;
use App\Region;
use App\Tower;



class TowerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Tower::sorted()->paginate(10);
        $table = Table::create($rows, ['id', 'name']);
        $table->setView('vendor.gbrock.table', ['class' => 'table table-striped table-hover']);
        $table->addColumn('region_id', 'Region', function($rows) {
            return !empty($rows->region->name) ? $rows->region->name : '';
        });
        return view('tower.index', array('table' => $table));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tower.create', ['region' => Region::pluck('name', 'id')]);
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
            'name' => 'required',
            'region_id' => 'required',
        ]);

        $tower = new Tower();
        $tower->name  = $request->input(['name']);
        $tower->region_id = $request->input(['region_id']);
        $tower->save();
        return redirect('towers');
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
        //
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
        //
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
