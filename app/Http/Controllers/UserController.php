<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gbrock\Table\Facades\Table;
use App\User;
use App\Role;
use App\Region;

class UserController extends Controller
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
        $user = User::sorted()->paginate(10);
        $table = Table::create($user, ['name', 'email']);
        $table->setView('vendor.gbrock.table', ['class' => 'table table-striped table-hover']);
        $table->addColumn('Role', 'Role', function($user) {
            return $user->roles->pluck('name')->first();
        });
        $table->addColumn('action', 'Action', function($user) {
            return '<a href="'.route('users.edit', $user->id).'">Edit</a>';
        });
        return view('user.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', ['roles' => Role::pluck('name', 'id'), 'regions' => Region::pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->Input(['name']);
        $user->email = $request->Input(['email']);
        $user->password = bcrypt($request->Input(['password']));
        $user->save();
        $user->roles()->attach($request->Input(['role']));
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $selectedRegion = !empty($user->region->id) ? $user->region->id : null;
            return view('user.edit', ['user' => $user,
                'roles' => Role::pluck('name', 'id'),
                'regions' => Region::pluck('name', 'id'),
                'selectedRegion' => $selectedRegion
            ]);
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required|unique:users,name," . $id,
            'email' => 'required|unique:users,email,' . $id,
        ]);

        $user = User::find($id);
        $user->name = $request->Input(['name']);
        $user->email = $request->Input(['email']);
        if (!empty($request->Input(['password']))) {
            $user->password = bcrypt($request->Input(['password']));
        }
        $user->region_id = $request->Input(['region']);
        $user->save();
        $user->detachRoles($user->roles);
        $user->roles()->attach($request->Input(['role']));
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
