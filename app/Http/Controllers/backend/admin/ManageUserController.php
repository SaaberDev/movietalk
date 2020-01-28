<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function manageUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('name', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('UserRole', function (User $user){
                    return $user->roles->first()->name;
                })
                ->addColumn('action', function($row){
                    return
                        '<a href="javascript:void(0)" title="accept" class="btn btn-primary btn-sm">
                                <i class="fas fa-user-check"></i> Accept
                            </a>' .
                        '<a href="javascript:void(0)" title="deny" class="btn btn-neutral btn-sm btn-custom1">
                                <i class="fas fa-user-times"></i> Deny
                            </a>' .
                        '<a href="javascript:void(0)" title="delete" class="btn btn-neutral btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>';
                })
                ->addColumn('ban', function($row){
                    return '<a href="javascript:void(0)" title="ban" class="btn btn-black btn-sm">
                                <i class="fas fa-user-alt-slash"></i>
                            </a>';})
                ->rawColumns(['action', 'ban'])
                ->make(true);
        }
        return view('backend.admin-panel.pages.allUser');
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
