@extends('layouts.app')

@section('title', 'View Course')

@section('content')

    @foreach ($datas as $data)
        <section class="max-w-5xl my-20 md:mx-auto mx-4 shadow-lg rounded-b-lg">
            <div class="relative text-left bg-blue-500 md:h-36 h-40 rounded-t-lg" id="particles-js">
                <div class="absolute w-full py-8 md:px-12 px-4">
                    <h1 class="text-white font-semibold md:text-2xl text-xl">{{ $data->name }}</h1>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center">
                            <p class="shadow-lg bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500 mr-2">
                                {{ $data->type }} </p>
                            <p class="shadow-lg bg-white px-2 py-1 rounded-md md:text-sm text-xs text-blue-500">
                                {{ $data->level }} </p>
                        </div>
                        <div>
                            <p class="text-white md:text-lg text-xs">Disubmit oleh {{ $data->submitted_by }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <main class="py-8 md:px-12 px-4">
                <div class="flex justify-between items-center">
                    <div class="author">
                        <h2 class="text-gray-600 font-semibold md:text-2xl text-base mb-1">Author</h2>
                        <p class="text-gray-500 md:text-sm text-xs">{{ $data->author }}</p>
                    </div>
                </div>
                <div class="mt-6 description">
                    <h2 class="text-gray-600 font-semibold md:text-2xl text-base mb-1">Description</h2>
                    <p class="text-gray-500 md:text-sm text-xs">{{ $data->description }}</p>
                </div>
                <div class="mt-6 btn-mulai-belajar">
                    <a class="md:inline-block block bg-blue-500 px-6 md:py-2 py-2 rounded-md md:text-lg text-base text-center font-semibold text-white hover:bg-blue-700 transition"
                        href="{{ $data->source_link }}">Mulai Belajar</a>
                </div>
                <hr class="mt-4">
                <div class="mt-6">
                    @if (Auth::user())

                        {{-- <form method="POST">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tutorials_id" value="{{ $data->id }}">
                            <div>
                                <textarea type="text"
                                    class="w-full mb-2 md:inline-block block border border-transparent px-4 py-2 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    name="comment" placeholder="Ketik Komentar..." required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 active:bg-blue-700 shadow-lg transition text-white rounded-md">POST</button>
                            </div>
                        </form> --}}
                        <div x-data="{ showModal : false }">
                            <div class="flex justify-end items-center">
                                <div>
                                    @if (Auth::check())
                                        @livewire('like-save', ['datas' => $datas, 'users_id' => Auth()->user()->id,
                                        'tutorials_id' => $data->id, 'vote' => 1])
                                    @else
                                        @livewire('like-save', ['datas' => $datas, 'users_id' => 0, 'tutorials_id' =>
                                        $data->id,
                                        'vote' => 1])
                                    @endif
                                </div>
                                <button @click="showModal = !showModal" class="text-lg  ml-6 text-gray-600"><i
                                        class="far fa-comment fa-lg mr-1"></i> {{ count($data->comments) }}</button>
                            </div>

                            <div x-show=" showModal"
                                class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal -->
                                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-full sm:w-5/12 mx-10"
                                    @click.away="showModal = false"
                                    x-transition:enter="transition ease duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                    x-transition:leave="transition ease duration-100 transform"
                                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                    <h1 class="text-center my-6 text-xl">Login to like, save, and comment this tutorial.
                                    </h1>
                                    <div class="text-center">
                                        <button @click="showModal = !showModal"
                                            class="px-4 py-2 text-sm  bg-gray-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-gray-700 focus:bg-indigo-50 focus:text-gray-200">Later</button>
                                        <a href="/login"
                                            class="px-4 py-2 text-sm bg-blue-600 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-100 focus:outline-none focus:ring-0 font-normal hover:bg-blue-700 focus:bg-indigo-50 focus:text-gray-200">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h2 class="text-blue-500 text-center">You must <a class="underline semibold" href="/login">Login</a>
                            to comment!</h2>
                    @endif

                </div>
            </main>
        </section>
    @endforeach
@endsection
