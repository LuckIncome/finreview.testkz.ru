<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Subscriber;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function subscribe(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        
        if (!Subscriber::where('email',$request->email)->exists()){
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
        }

        return response()->json(['success' => true], 200);
    }

    public function feedback(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $text = $request->get('text');
        $url = $request->get('url');

        $to = "sahov.jando@gmail.com";
        $subject = "Заявка с сайта finreview.kz";
        $sendfrom   = "no-reply@finreview.kz";
        $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

        $message = "
        $subject<br>
        <b>Имя:</b> $name <br>
        <b>Email:</b> $email <br>
        <b>Сообщения:</b> $text <br>
        <b>URL:</b> $url";

        $send = mail($to, $subject, $message, $headers);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        
        if ($send)
        { 
            $feedback = new Feedback();
            $feedback->name = $request->name;
            $feedback->email = $request->email;
            $feedback->text = $request->text;
            $feedback->save();
        }

        return response()->json(['success' => true], 200);
    }
}
