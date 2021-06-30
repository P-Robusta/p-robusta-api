<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return $this->sendResponse($banners, 'Get successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // ------------- Upload image to imgbb.com by php -------------
    public function save_record_image($image, $name = null)
    {
        $API_KEY = '22db36e00bee3ef919df52f806224a17';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $file_name = ($name) ? $name . '.' . $extension : $image['name'];
        $data = array('image' => base64_encode(file_get_contents($image['tmp_name'])), 'name' => $file_name);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
            curl_close($ch);
        } else {
            return json_decode($result, true);
            curl_close($ch);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'image' => 'required'
        ]);

        $category = Banner::create($request->all());

        return $this->sendResponse($category, 'Created successfully.');

        // ------------- Upload image to imgbb.com by php -------------
        // if (!empty($request->file('image')) && $request->hasFile('image')) {
        //     $return = $this->save_record_image($_FILES['image'], 'test');
        //     return $this->sendResponse($return['data']['url'], 'Get successfully.');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        $banner = Banner::find($banner);
        return $this->sendResponse($banner, 'Get successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'text' => 'string',
            'image' => 'url|active_url'
        ]);

        $update = Banner::find($banner->id);
        if (isset($request->text)) {
            $update->text = $request->text;
        }
        if (isset($request->image)) {
            $update->image = $request->image;
        }

        $update->save();

        return $this->sendResponse($update, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner = Banner::find($banner->id);
        $banner->delete();
        return $this->sendResponse($banner, 'Deleted successfully.');;
    }
}
