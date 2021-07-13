<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\JoinUsTag;
use Illuminate\Http\Request;

class JoinUsTagController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = JoinUsTag::all();
        return $this->sendResponse($tag, 'Get successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|unique:join_us_tags',
        ]);

        $tag = JoinUsTag::create($request->all());

        return $this->sendResponse($tag, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JoinUsTag  $joinUsTag
     * @return \Illuminate\Http\Response
     */
    public function show(JoinUsTag $joinUsTag)
    {
        $res = JoinUsTag::find($joinUsTag);
        return $this->sendResponse($res, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JoinUsTag  $joinUsTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JoinUsTag  $joinUsTag)
    {
        $request->validate([
            'tag' => 'required|string|unique:join_us_tags',
        ]);

        $joinUsTag->update($request->all());

        return $this->sendResponse($joinUsTag, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JoinUsTag  $joinUsTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(JoinUsTag $joinUsTag)
    {
        $joinUsTag->delete();
        return $this->sendResponse($joinUsTag, 'Deleted successfully.');
    }
}
