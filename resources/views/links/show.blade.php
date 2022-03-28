@extends('layouts.app')
@section('content')
    Clicks:
    <table class="w-full text-sm text-left text-gray-500 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                ip
            </th>
            <th scope="col" class="px-6 py-3">
                fingerprint
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($link->clicks as $click)
            <a></a>


            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap" >
                   {{$click->id}}
                </th>
                <td class="px-6 py-4">
                   {{$click->ip}}
                </td>
                <td class="px-6 py-4">
                   {{$click->fingerprint}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
