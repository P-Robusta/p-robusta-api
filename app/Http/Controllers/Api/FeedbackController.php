<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Feedback::all(), 'Get successfully.');
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
            'image' => 'required|url|active_url',
            'quote' => 'required|string',
            'info' => 'required|string'
        ]);

        $feedback = Feedback::create($input);
        return $this->sendResponse($feedback, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return $this->sendResponse($feedback, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $input = $request->validate([
            'name' => 'string|max:150',
            'image' => 'url|active_url',
            'quote' => 'string',
            'info' => 'string'
        ]);

        $feedback->update($input);

        return $this->sendResponse($feedback, 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return $this->sendResponse($feedback, 'Deleted successfully!');
    }
}
