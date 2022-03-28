@extends('layouts.app')
@section('content')
    Links:
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Url
                </th>
                <th scope="col" class="px-6 py-3">
                    target
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
            @foreach($links as $link)


                <tr class="bg-white border-b ">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900  whites pace-nowrap" >
                        <a href="{{route('links.show',$link->id)}}">{{$link->id}}   </a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('links.show',$link->id)}}">{{$link->url}}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('links.show',$link->id)}}">{{$link->target}}</a>
                    </td>
                    @if(auth()->user()->premium)
                    <td class="px-6 py-4">
                        <a href="{{route('links.show',$link->id)}}">{{$link->clicks->count()}}</a>
                    </td>
                    @else<td class="px-6 py-4">
                       You need Premium
                    </td>
                    @endif
                    </a>
                    <td class="px-6 py-4 text-right">
                        <form method="POST" action="{{route('links.destroy',$link->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>





@endsection
