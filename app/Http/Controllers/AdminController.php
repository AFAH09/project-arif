<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Aparat;
use App\Providers\RouteServiceProvider;
use illuminate\Auth\Events\Registered;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use illuminate\Validation\Rule;
use DB;

class AdminController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aparats = DB::table('aparats')
        ->select('aparats.id', 'aparat.jabatan' , 'aparats.rt' , 'aparats.rw')
        ->orderBy('aparats.rt' , 'asc')
        ->orderBy('aparats.rw' , 'asc')
        ->get();

        $role = Auth::user()->role;

        if($role != 'Admin') {
            return viwe('livewire.failed');
        }

        return viwe('admin2')->with('aparats', $aparats);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {

     }

     /**
      *@param \Illuminate\Http\Request
      *@return \Illuminate\Http\Response
      */
      public function store(Request $request)
      {
        $request->validate([
            'nik' => 'required',
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'email' , 'max:255' , 'unique:user'],
            'password' => ['required', Rules\Password::defaults()],
            'jabatan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Aparat',
        ]);


        Aparat::create([
            'nik' => $request->nik,
            'jabatan' => strtoupper($request->jabatan),
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        $aparats = DB::table('aparats')
        ->select('aparats.id', 'aparats.jabatan', 'aparats.rt', 'aparats.rw')
        ->orderBy('aparats.rt', 'asc')
        ->orderBy('aparats.rw', 'asc')
        ->get();

        return viwe('admin2')->with('aparats', $aparats);
      }

      public function showFromDaftar(){
        $role = Auth::user()->role;

        if($role != 'Admin'){
            return viwe('livewire.failed');
        }

        return viwe('admin');
    }

    /**
     *
     *@param int
     *@return \Illuminate\Http\Response
     */

     public function show($id)
     {

     }

     /**
      *
      *@param int #id
      *@return \Illuminate\Http\Response
      */
      public function edit($id)
      {
        //
      }

      /**
       *
       * @param  \Illuminate\Http\Request
       * @param int $id
       *@return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
        //
      }

      /**
       *
       * @param int $id
       *@return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        //
      }
}

