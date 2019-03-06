<?php

namespace App\Http\Controllers\backend;

use App\verification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    public function PendingVerification()
    {
        $verification = verification::all();
        return view('backend.verification.pending', compact('verification'));
    }

    public function PendingVerificationChange(Request $request)
    {
        $insert = verification::find($request->c);
        if ($request->b == "add") {
            if ($request->a == "nid") {
                $insert->nid_status = 1;
            } elseif ($request->a == "pas") {
                $insert->passport_status = 1;
            } else {
                $insert->driving_status = 1;
            }
        } else {
            if ($request->a == "nid") {
                $insert->nid_status = 2;
            } elseif ($request->a == "pas") {
                $insert->passport_status = 2;
            } else {
                $insert->driving_status = 2;
            }
        }
        $insert->save();

        return redirect('admin-pending-verification');
    }

    public function ApproveVerification()
    {
        $verification = verification::all();
        return view('backend.verification.approve', compact('verification'));
    }

    public function DisapproveVerification()
    {
        $verification = verification::all();
        return view('backend.verification.disapprove', compact('verification'));
    }
}
