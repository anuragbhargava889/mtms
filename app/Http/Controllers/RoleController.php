<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Gbrock\Table\Facades\Table;

class RoleController extends Controller
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
        $role = Role::sorted()->paginate(10);
        $table = Table::create($role, ['name', 'description']);
        $table->setView('vendor.gbrock.table', ['class' => 'table table-striped table-hover']);
        $table->addColumn('action', 'Action', function($role) {
            return '<a href="'.route('roles.edit', $role->id).'">Edit</a>';
        });
        return view('role.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
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
            'name' => "required",
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->Input(['name']);
        $role->display_name = $request->Input(['display_name']);
        $role->description = $request->Input(['description']);
        $role->save();
        return redirect('roles');
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
        return view('role.edit', ['role' => Role::find($id)]);
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
            'name' => "required",
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->Input(['name']);
        $role->display_name = $request->Input(['display_name']);
        $role->description = $request->Input(['description']);
        $role->save();
        return redirect('roles');
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
