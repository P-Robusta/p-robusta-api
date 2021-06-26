<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NumberOverview;
use Illuminate\Http\Request;

class NumberOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = NumberOverview::all();
        return response()->json($num);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);

        // $contact = NumberOverview::create($request->all());

        // return response()->json([
        //     'message' => 'NumberOverview created',
        // ]);
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
        return response()->json($num);
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
            'current_students' => 'number',
            'alumni' => 'number',
            'percent_get_job' => 'number',
            'partnership' => 'number',
        ]);
        $num = NumberOverview::find($id);

        $num->current_students = $request->current_students;
        $num->alumni = $request->alumni;
        $num->percent_get_job = $request->percent_get_job;
        $num->partnership = $request->partnership;

        $num->save();

        // $message = [
        //     'content' => 'Cám ơn bạn "' . $request->name . '" đã liên hệ.',
        // ];

        // SendEmail::dispatch($message, $request->email, null)->delay(now()->addMinute(1));

        return response()->json([
            'message' => 'NumberOverview updated!',
            'NumberOverview' => $num
        ]);
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
