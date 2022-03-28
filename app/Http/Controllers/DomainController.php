<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use App\Models\Domain;

class DomainController extends Controller
{

    public function index()
    {
        $domains = Domain::all();
        return view('domains.index', compact('domains'));
    }


    public function create()
    {
        return view('domains.create');
    }


    public function store()
    {

        $data = request()->validate([
            'domain' => 'required|unique:domains|max:255'

        ]);
        $data['premium'] = request('premium') ? 1 : 0;

        $newDomain = new Domain();
        $newDomain->domain = $data['domain'];
        $newDomain->premium = $data['premium'];

        $newDomain->save();

        return redirect()->route('domains');
    }


    public function show(Domain $domain)
    {
        return view('domains.show', compact('domain'));
    }





    public function update(Domain $domain)
    {
        $domain->premium = !$domain->premium;
        $domain->save();
        return back();
    }


    public function destroy(Domain $domain)
    {
        $domain->delete();

        return redirect()->route('domains');
    }
}
