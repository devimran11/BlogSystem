<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers= Subscriber::latest()->get();
        return view('layouts.backend.subscriber', compact('subscribers'));
    }
    public function destroy($subscriber){
        $delete = Subscriber::findOrFail($subscriber);
        $delete->delete();
        Toastr::success("Subscriber Successfully deleted", 'success');
        return redirect()->back();
    }
}
