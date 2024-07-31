<?php

namespace App\Http\Controllers;

use App\Models\Faq;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Auth;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        
        return view('faq', compact('faqs'));
    }
    
    public function faq()
    {
        $candidate = Auth::user()->candidate;
        $faqs = Faq::all();
        
        return view('dashboard.admin.faq', compact('candidate', 'faqs'));
    }
    
    public function createFaq()
    {
        return view('dashboard/admin/create-faq');
    }

    public function storeFaq(Request $request)
    {
        DB::table('faq')->insert([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect()->route('dashboard-faq');
    }
    
    public function editFaq($id)
    {
        $faq = DB::table('faq')->find($id);

        return view('dashboard/admin/edit-faq', compact('faq'));
    }

    public function changeFaq(Request $request)
    {
        DB::table('faq')
            ->where('id', $request->id)
            ->update(
                [
                    'question' => $request->question,
                    'answer' => $request->answer
                ]
            );

        return redirect()->route('dashboard-faq', $request->id);
    }

    public function deleteFaq(Request $request)
    {
        DB::table('faq')->where('id', $request->id)->delete();

        return redirect()->route('dashboard-faq');
    }
}
