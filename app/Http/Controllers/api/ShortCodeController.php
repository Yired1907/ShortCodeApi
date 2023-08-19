<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;
use Illuminate\Support\Facades\Cache;

class ShortCodeController extends Controller
{


    public function create()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = substr(str_shuffle($characters), 0, 6);

        Cache::put('random_code', $randomCode);

        $cachedCode = Cache::get('random_code');

        $code = new Code();
        $code->code = $cachedCode;
        $code->save();

        return $code;
    }

    public function getcode(Request $request)
    {
        $code = $this->create($request);
        return $code;
    }

    public function checkcode(Request $request)
    {
        $code = $request->input('code');
        $codeModel = Code::where('code', $code)->first();

        if ($codeModel) {
            if ($codeModel->status == 0) {
                $codeModel->status = 1;
                $codeModel->save();

                return response()->json([
                    'message' => 'Mã hợp lệ',
                    'errCode' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Mã đã được sử dụng',
                    'errCode' => 201
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Mã không hợp lệ',
                'errCode' => 201
            ]);;
        }
    }
}
