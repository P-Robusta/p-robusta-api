<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\JoinUs;
use Illuminate\Http\Request;

class JoinUsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jd = JoinUs::all();
        return $this->sendResponse($jd, 'Get successfully.');
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
            'title' => 'required|string|unique:join_us',
            'id_tag' => 'required|numeric|exists:join_us_tags,id',
            'organisation' => 'required|string',
            'reporting_to' => 'required|string',
            'status' => 'required|string',
            'project' => 'required|string',
            'start_date' => 'required|string',
            'location' => 'required|string',
            'jd' => 'required'
        ]);

        $jd = JoinUs::create($request->all());

        return $this->sendResponse($jd, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JoinUs  $joinUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jd = JoinUs::find($id);
        return $this->sendResponse($jd, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JoinUs  $joinUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|unique:join_us',
            'id_tag' => 'numeric|exists:join_us_tags,id',
            'organisation' => 'string',
            'reporting_to' => 'string',
            'status' => 'string',
            'project' => 'string',
            'start_date' => 'string',
            'location' => 'string'
        ]);

        $joinUs = JoinUs::find($id);
        $joinUs->update($request->all());

        return $this->sendResponse($joinUs, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JoinUs  $joinUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jd = JoinUs::find($id);
        $jd->delete();
        return $this->sendResponse($jd, 'Deleted successfully.');
    }
}
