<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::whereId(1)->first();
        //dd(json_decode($user->experience)->details[0]);
        return view('resume', compact('user'));
    }

    public function addForm(Request $request){
        $name = "Makinde Tolu Michael";
        $email = "makindet74@gmail.com";

        $description = [
            "desc" => "Results-driven freelance Civil and Software Engineer, with passion for solving challenging unique problems, seeking to use proven programming and engineering skills to deliver construction and coding excellence.Contributed to REST APIs projects, Multitenant applications and have build project for people as a freelancer.",
            "phone_number" => "09022244562",
        ];

        $education = [
            "degree" => "Master of Fine Arts & Graphic Design",
            "date" => "2015 - 2016",
        ];

        $experience = [
            "title" => "Graphic design specialist",
            "date" => "2017 - 2018",
            "details" => [
                "Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).",
                "Managed up to 5 projects or tasks at a given time while under pressure",
                "Recommended and consulted with clients on the most appropriate graphic design",
                "Created 4+ design presentations and proposals a month for clients and account managers"
            ],
        ];

        User::create([
            "name" => $name,
            "email" => $email,
            "description" => json_encode($description),
            "education" => json_encode($education),
            "experience" => json_encode($experience)
        ]);

        return response()->json([
            "message" => "saved"
        ], 200);
    }

    public function sendMail(Request $request){
        try {
            // confirm token
            $user = User::whereId(1)->first();
            
            $name = $request->name;
            $email = $request->email;
            $messageContent = $request->message;

            $data = [
                'name' => $name,
                'email' => $email,
                'messageContent' => $messageContent,
                'user_email'=> $user->email,
            ];
            
            /*Mail::send(
                    'mail-visitor',
                    ["data" => $data],
                    function ($m)use($data) {  
                    $m->from('meeulaco@meeula.com');
                    $m->to($data['email'])->subject('Hey! thanks for your message!');
                });*/

            return redirect()->back()->with(["message" => "message sent to user!"]);

        } catch (Exception $ex) {
            return redirect()->back()->with(["message" => "An error occured, please resend message!"]);
            
        }            
    }

}
