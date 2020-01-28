<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewUserProfile()
    {
        $user = Auth::User();
        return view('frontend.pages.UserProfile.viewUserProfile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EditUserProfile()
    {
        $user = Auth::User();
        return view('frontend.pages.UserProfile.editUserProfile', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdateUserProfile(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->update();

        return redirect()->route('viewUserProfile', $user);
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
