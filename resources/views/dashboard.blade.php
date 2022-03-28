@extends('layouts.app')
@section('content')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @foreach($errors->all() as $error)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $error }}</span>
                        </div>
                    @endforeach


                    <form action="{{route('links.store')}}" method="POST">
                        @csrf
                        Domains:
                        <select name="domain_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @foreach($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->domain }} @if($domain->premium)★ Premium ★ @endif</option>
                            @endforeach

                        </select>


                            <br>
                            <div class="mb-6">
                                <label for="shortcut" class="block mb-2 text-sm font-medium text-gray-900">Shortcut (Text after the /)</label>
                                <input type="text" name="shortcut" id="shortcut" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                            </div>


                        <div class="mb-6">
                                <label for="target" class="block mb-2 text-sm font-medium text-gray-900">Redirect Target</label>
                                <input type="text" name="target" id="target" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                        </div>



                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create new Link</button>
                    </form>

@endsection
