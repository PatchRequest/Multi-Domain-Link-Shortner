<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Click;
use App\Models\Domain;
use App\Models\Link;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{

    public function index()
    {
        // return all links of the authenticated user
        $links = auth()->user()->links;

        return view('links.index', compact('links'));


    }


    public function create()
    {

        return Redirect::route('dashboard');
    }


    public function store()
    {
        //
        $data = request()->validate([
            'domain_id' => 'required',
            'shortcut' => 'required',
            'target' => 'required',
        ]);
        $domain = Domain::find($data['domain_id']);
        if((!auth()->user()->premium && $domain->premium) && !auth()->user()->is_admin) {
            return redirect()->route('Dashboard')->with('error', 'You need to upgrade your account to create premium links');
        }
        $fullUrl = "http://" . $domain->domain . "/" . $data['shortcut'];

        $newLink = new Link();
        $newLink->user_id = auth()->user()->id;
        $newLink->title = $fullUrl;
        $newLink->url = $fullUrl;
        $newLink->target = $data['target'];
        $newLink->domain_id = $data['domain_id'];
        $newLink->save();




        return redirect()->route('links.show', $newLink->id);

    }


    public function show(Link $link)
    {

        if (auth()->user()->id != $link->user_id) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to view this link');
        }
        if (!auth()->user()->premium){
            return back();
        }
        return view('links.show', compact('link'));
    }





    public function destroy(Link $link)
    {
        if (auth()->user()->id != $link->user_id) {
            return Redirect::route('dashboard')->with('error', 'You are not authorized to delete this link');

        }
        $link->delete();
        return Redirect::route('dashboard')->with('success', 'Link deleted successfully');
    }


    public function useLink(){

        // get full url
        $fullUrl = request()->fullUrl();

        // get link from url
        $link = Link::where('url', $fullUrl)->first();
        if (!is_null($link)) {


            // create click object
            $click = new Click();
            $click->user_id = null;
            $click->ip = request()->ip();
            $click->link_id = $link->id;
            $click->fingerprint = request()->header('User-Agent');
            $click->save();

        }
        // redirect to target
        return redirect($link->target);

    }
}
