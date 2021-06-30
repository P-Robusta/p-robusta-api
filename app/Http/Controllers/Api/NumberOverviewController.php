<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
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
        $num = NumberOverview::find($numberOverview);
        return $this->sendResponse($num, 'Get successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberOverview  $numberOverview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'current_students' => 'numeric',
            'alumni' => 'numeric',
            'percent_get_job' => 'numeric',
            'partnership' => 'numeric',
        ]);
        $num = NumberOverview::find($id);

        $num->current_students = $request->current_students;
        $num->alumni = $request->alumni;
        $num->percent_get_job = $request->percent_get_job;
        $num->partnership = $request->partnership;

        $num->save();

        return $this->sendResponse($num, 'NumberOverview updated!');
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
