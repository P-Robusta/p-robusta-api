<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noti = Notification::all();
        return $this->sendResponse($noti, 'Get successfully.');
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
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        $notification = Notification::create($request->all());

        return $this->sendResponse($notification, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        return $this->sendResponse($notification, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'string',
        ]);

        $notification->update($request->all());

        return $this->sendResponse($notification, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification  $notification)
    {
        $notification->delete();
        return $this->sendResponse($notification, 'Deleted successfully.');
    }
}
