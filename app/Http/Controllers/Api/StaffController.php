<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Staff::all(), 'Get successfully!');
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
            'name' => 'required|string',
            'image' => 'required|url|active_url',
            'quote' => 'required|string',
            'position' => 'required|string',
        ]);

        $staff = Staff::create($request->all());

        return $this->sendResponse($staff, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return $this->sendResponse($staff, 'Get successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $input = $request->validate([
            'name' => 'string',
            'image' => 'url|active_url',
            'quote' => 'string',
            'position' => 'string',
        ]);

        $staff->update($input);

        return $this->sendResponse($staff, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return $this->sendResponse($staff, 'Deleted successfully!');
    }
}
