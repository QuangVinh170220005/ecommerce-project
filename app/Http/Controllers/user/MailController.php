<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $data =[
            'subject' => 'Cambo Tutorial mail',
            'body' => 'Hello this is my email delevery'
        ];
        try{
            Mail::to('quangvinhabcdg@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great, check your inbox']);
        }catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage()
            ]);
        }
    }
}
