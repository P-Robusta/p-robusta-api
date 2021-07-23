<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Partner::all(), 'Get successfully.');
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
            'name' => 'string',
            'image_with_pn'  => 'url|active_url',
            'logo'  => 'required|url|active_url',
            'note_for_image' => 'string',
            'website' => 'url|active_url'
        ]);

        $partner = Partner::create($input);
        return $this->sendResponse($partner, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return $this->sendResponse($partner, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $input = $request->validate([
            'name' => 'string',
            'image_with_pn'  => 'url|active_url',
            'logo'  => 'url|active_url',
            'note_for_image' => 'string',
            'website' => 'url|active_url'
        ]);

        $partner->update($input);

        return $this->sendResponse($partner, 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return $this->sendResponse($partner, 'Deleted successfully!');
    }
}
