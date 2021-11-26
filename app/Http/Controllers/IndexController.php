<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\People;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $peoples = People::all();
        $services = Service::all();

        $tags = DB::table('portfolios')->distinct()->pluck('filter')->toArray();
        foreach ($pages as $page) {
            $item = ['title' => $page->name, 'alias' => $page->alias];
            $menu[] = $item;
        }

        $menu[] = ['title' => 'Services', 'alias' => 'service'];
        $menu[] = ['title' => 'Portfolio', 'alias' => 'Portfolio'];
        $menu[] = ['title' => 'Team', 'alias' => 'team'];
        $menu[] = ['title' => 'Contact', 'alias' => 'contact'];

        return view('site.index', [
            'menu' => $menu,
            'pages' => $pages,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'services' => $services,
            'tags' => $tags,
        ]);
    }

    public function contactForm(Request $request){
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|between:2,100',
            'email'    => 'required|string|email|max:100|unique:users',
            'message' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            $message = $validator->getMessageBag()->first();
            toastr()->error($message);
            return redirect()->back();
        }

        $data = $request->all();
        $name = $request->input('name');
        $members = [''];
        $userMessage = $request->input('message');
//        Mail::to($members)->send(new NotificationEmail(compact('name','userMessage')));
        toastr()->success('Mail successfully send!');
        return redirect()->back();

    }
}
