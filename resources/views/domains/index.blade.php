@extends('layouts.app')
@section('content')
    <a href="{{route('domains.create')}}"><button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Domain</button></a><br>
 <br>
    All Domains
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Domain
                </th>
                <th scope="col" class="px-6 py-3">
                    Links
                </th>
                <th scope="col" class="px-6 py-3">
                    Premium
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($domains as $domain)
                <a></a>


                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap" >
                        <a href="{{route('domains.show',$domain->id)}}">{{$domain->id}}</a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('domains.show',$domain->id)}}">{{$domain->domain}}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('domains.show',$domain->id)}}">{{$domain->links->count()}}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('domains.show',$domain->id)}}">{{$domain->premium ? 'Yes' : 'No'}}</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
