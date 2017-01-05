<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspection;
use Gbrock\Table\Facades\Table;
use Auth;

class InspectionController extends Controller
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
        $region = Inspection::sorted()->paginate(10);
        $table = Table::create($region, ['title', 'detail', 'region_id', 'manager_id', 'local_technician_id', 'status', 'start_date' , 'end_date']);
        $table->setView('vendor.gbrock.table', ['class' => 'table table-striped table-hover']);
        $table->addColumn('Action', 'Action', function($region) {
            return '<a href="'.route('inspections.edit', $region->id).'">Edit</a>';
        });
        return view('inspections.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('inspections.create');
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
