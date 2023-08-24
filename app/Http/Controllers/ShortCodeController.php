<?php

namespace App\Http\Controllers;

use App\Http\Services\CodeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShortCodeController extends Controller
{
    protected $CodeServices;
    public function __construct(CodeServices $CodeServices)
    {
        $this->CodeServices = $CodeServices;
    }

    public function index()
    {
        return view('button.checkcode');
    }

    public function store(Request $request)
    {
        $code = $request->input('code');
        if (session()->has($code)) {
            session()->flash('error', 'Mã đã được sử dụng!');
            return redirect()->back();
        }

        if ($this->CodeServices->isValid($code)) {
            session()->put($code, true);
            session()->flash('success', 'Mã hợp lệ!');
            return redirect('/home');
        } else {
            session()->flash('error', 'Mã không đúng!');
            return redirect()->back();
        }
    }

    //Tạo code
    // public function show()
    // {
    //     return view('button.countdown');
    // }

    // public function create(Request $request)
    // {
    //     $code = $this->CodeServices->create($request);
    //     return $code;
    // }
}
