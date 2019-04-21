<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscriptionRequest;
use App\Jobs\UnsubscribeEmailNewsletter;
use App\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class NewsletterSubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(NewsletterSubscriptionRequest $request)
    {
         //return $request->validated();
        $newsletterSubscription = NewsletterSubscription::create($request->validated());

      
        //return "success";
        //return back()->withSuccess(__('newsletter.created'));
        return Redirect::to(URL::previous() . "#pysubscribe");
        //Session::flash('success', __('newsletter.created'));
        //return redirect()->back()->withErrors($request->validated());
    }

    public function check(Request $request)
    {
         //return $request->validated();
        $myemail = NewsletterSubscription::where('email', $request->email)->first();

        if($myemail){
            return "present";
        }
        return "no";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:newsletter_subscriptions,email'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $route = 'mylogin';

            if (Auth::check()) {
                $route = 'home';
            }

            return redirect()->route($route)->withErrors($errors);
        }

        UnsubscribeEmailNewsletter::dispatch($request->input('email'));

        Session::flash('success', __('newsletter.unsubscribed'));

        return view('newsletters.unsubscribed');
    }
}
