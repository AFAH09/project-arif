<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Aparat;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class DaftarAparatController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return viwe('admin2');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
        //
     }

    /**
     *
     * @param \Illuminate\Http\Request
     *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     *
     * @param \Illuminate\Http\Request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
