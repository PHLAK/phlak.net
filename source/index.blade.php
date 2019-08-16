@extends('_layouts.master')

@section('content')
    <div class="flex content-center items-center justify-center h-screen w-full p-4">
        <img src="assets/images/PHLAK.svg" alt="PHLAK">
    </div>

    <div class="absolute text-gray-700 text-xs bottom-0 right-0 p-4">
        &copy; {{ date('Y') }}

        <a href="https://www.chriskankiewicz.com" class="underline hover:text-pink-700">
            Chris Kankiewicz
        </a>
    </div>
@endsection
