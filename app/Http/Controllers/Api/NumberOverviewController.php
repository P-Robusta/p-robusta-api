<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\NumberOverview;
use Illuminate\Http\Request;

class NumberOverviewController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = NumberOverview::all();
        return $this->sendResponse($num, 'Get successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumberOverview  $numberOverview
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOverview  $numberOverview)
    {
        return $this->sendResponse($numberOverview, 'Get successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberOverview  $numberOverview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOverview  $numberOverview)
    {
        $input = $request->validate([
            'current_students' => 'numeric',
            'alumni' => 'numeric',
            'percent_get_job' => 'numeric|max:100|min:0',
            'partnership' => 'numeric',
        ]);

        $numberOverview->update($input);

        return $this->sendResponse($numberOverview, 'NumberOverview updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumberOverview  $numberOverview
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
}
