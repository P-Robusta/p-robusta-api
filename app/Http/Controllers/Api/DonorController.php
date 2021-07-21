<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Donor::all(), 'Get successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'code' => 'required|unique:donors,code|starts_with:DNTT',
            'email' => 'required|email|unique:donors,email',
            'phone' => 'required|string|unique:donors,phone',
            'message' => 'nullable|string',
            'selectedOption' => 'required|exists:options,option',
        ]);

        $input['total'] = 0;

        $donor = Donor::create($input);

        return $this->sendResponse($donor, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        return $this->sendResponse($donor, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        $input = $request->validate([
            'name' => 'string',
            'code' => 'unique:donors,code|starts_with:DNTT',
            'email' => 'email|unique:donors,email',
            'phone' => 'string',
            'message' => 'nullable|string',
            'selectedOption' => 'exists:options,option',
        ]);

        $donor->update($input);

        return $this->sendResponse($donor, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        $donor->delete();
        return $this->sendResponse($donor, 'Deleted successfully.');
    }
}
