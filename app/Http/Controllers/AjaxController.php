<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Render Blade function
     *
     * @param Request $request
     * @return void
     *
     */
    public function renderBlade(Request $request)
    {
        if($request->count){
            return response(['message' => 'Success','data' => view('ajax', ['count' => $request->count])->render()], 200);
        }
        return response(['message' => 'Something Wrong!'], 400);
    }

    public function renderAjax(Request $request)
    {
        return view('ajax-request');
    }
}
