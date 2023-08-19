<?php


namespace App\Http\Services;

use App\Models\Code;
use Illuminate\Support\Facades\Cache;

class CodeServices
{
    //Tạo code random
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


    //Xét điều kiện
    public function isValid($code)
    {
        $maModel = Code::where('code', $code)
            ->first();

        if ($maModel !== null) {
            $maModel->status = 1;
            $maModel->save();
            return true;
        }
    }
}
