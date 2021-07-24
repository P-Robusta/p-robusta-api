<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Jobs\SendEmail;
use App\Models\Donor;
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
      $fileNameCV = $fileCV->getClientOriginalName('candidate_cv');
      $fileCV->move('temp', $fileNameCV);
      $cv = public_path('temp/' . $fileNameCV);
      // cover letter
      $fileCoverLetter = $request->file('candidate_cover_letter');
      $fileNameCL = $fileCoverLetter->getClientOriginalName('candidate_cover_letter');
      $fileCoverLetter->move('temp', $fileNameCL);
      $coverLetter = public_path('temp/' . $fileNameCL);
    }

    SendEmail::dispatch($data, $cv, $coverLetter, 'recuitment_email')->delay(now()->addMinute(1));

    if ($request->hasFile('candidate_cv') && $request->hasFile('candidate_cover_letter')) {
      File::delete(public_path('temp/' . $fileNameCV));
      File::delete(public_path('temp/' . $fileNameCL));
    }

    return $this->sendResponse('Successfully', 'Sent email successfully.');
  }

  public function EmailRegisterDonor(Request $request)
  {
    $data = [
      'subject' => "Email Register to Become a Donor for #IT-RAISE-DONOR",
      'name' => $request->input('name'),
      'phone' => $request->input('phone'),
      'email' => $request->input('email'),
      'code' => $request->input('code'),
      'selectedOption' => $request->input('selectedOption')
    ];

    SendEmail::dispatch($data, null, null, 'register_become_donor')->delay(now()->addMinute(1));

    return $this->sendResponse('Successfully', 'Sent email successfully.');
  }

  public function ForgetCode(Request $request)
  {

    $donor = Donor::where('email', $request->input('email'))->first();
    if ($donor) {
      $data = [
        'subject' => "Email Register to Become a Donor for #IT-RAISE-DONOR",
        'name' => $donor['name'],
        'phone' => $donor['phone'],
        'email' => $donor['email'],
        'code' => $donor['code'],
        'selectedOption' => $donor['selectedOption']
      ];

      SendEmail::dispatch($data, null, null, 'register_become_donor')->delay(now()->addMinute(1));

      return $this->sendResponse('Successfully', 'Sent email successfully.');
    } else {
      return $this->sendResponse('Failfully', 'Sent email failfully.');
    }
  }
}
