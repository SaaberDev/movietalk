<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\posts;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManagePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function managePost()
    {
        return view('backend.admin-panel.pages.allPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function getPosts(Request $request)
    {
        if ($request->ajax()) {
            $data = posts::orderBy('title', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('PostByUser', function (posts $posts){
                    return $posts->users->name;
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

                ->rawColumns(['PostByUser', 'action'])
                ->make(true);
        }
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
