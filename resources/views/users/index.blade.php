@extends('layouts.app')
@section('content')

    User:
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    links
                </th>
                <th scope="col" class="px-6 py-3">
                    premium
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">toggle Premium</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)


                <tr class="bg-white border-b ">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900  whites pace-nowrap" >
                        {{$user->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->links->count()}}
                    </td>

                    <td class="px-6 py-4">
                        {{$user->premium ? 'Yes' : 'No'}}
                    </td>


                    <td class="px-6 py-4 text-right">
                        <form method="POST" action="{{route('users.toggle',$user->id)}}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"> toggle</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
