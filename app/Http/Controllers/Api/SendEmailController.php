<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\File;

class SendEmailController extends BaseController
{
  public function EmailRecuitment(Request $request)
  {
    $data = [
      'subject' => "[Email from Candidate]",
      'name' => $request->input('candidate_name'),
      'phone' => $request->input('candidate_phone'),
      'email' => $request->input('candidate_email'),
    ];

    $cv = null;
    $coverLetter = null;
    if ($request->hasFile('candidate_cv') && $request->hasFile('candidate_cover_letter')) {
      // CV
      $fileCV = $request->file('candidate_cv');
      $fileName = $fileCV->getClientOriginalName('candidate_cv');
      $fileCV->move('temp', $fileName);
      $cv = public_path('temp/' . $fileName);
      File::delete(public_path('temp/' . $cv));
      // cover letter
      $fileCoverLetter = $request->file('candidate_cover_letter');
      $fileName = $fileCoverLetter->getClientOriginalName('candidate_cover_letter');
      $fileCoverLetter->move('temp', $fileName);
      $cv = public_path('temp/' . $fileName);
      File::delete(public_path('temp/' . $cv));
    }

    SendEmail::dispatch($data, $cv, $coverLetter, 'recuitment_email')->delay(now()->addMinute(1));

    return $this->sendResponse('Successfully', 'Sent email successfully.');
  }
}
