@extends('layouts.app')
@section('content')
    Create a Domain
    <form action="{{route('domains.store')}}" method="POST">
        @csrf



            <br>
            <div class="mb-6">
                <label for="domain" class="block mb-2 text-sm font-medium text-gray-900">Domain</label>
                <input type="text" name="domain" id="domain" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>


        <div class="mb-6">
            <label for="premium" class="block mb-2 text-sm font-medium text-gray-900">Premium</label>
            <input type="checkbox" name="premium" id="premium" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>



        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Submit Domain</button>
    </form>
@endsection
