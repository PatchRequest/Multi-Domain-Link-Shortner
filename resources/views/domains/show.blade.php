@extends('layouts.app')
@section('content')
    current status: {{ $domain->premium ? 'premium' : 'free' }}
    <form action="{{route('domains.update',$domain->id)}}" method="POST">
        @method('PUT')
        @csrf
        <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Toggle Premium</button>
    </form>


    <br>
    <form action="{{route('domains.destroy',$domain->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class=" inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete</button>
    </form>
    <br>
    Links:
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Link
                </th>
                <th scope="col" class="px-6 py-3">
                    creator
                </th>
                <th scope="col" class="px-6 py-3">
                    clicks
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($domain->links as $link)
                <a></a>


                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap" >
                        <a href="{{route('links.show',$link->id)}}">{{$link->id}}</a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('links.show',$link->id)}}">{{$link->url}}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('links.show',$link->id)}}">{{$link->user->email}}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('links.show',$link->id)}}">{{$link->clicks->count()}}</a>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form method="POST" action="{{route('links.destroy',$link->id)}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
