@extends('layout.app')
@section('content')
    <div>
        <div class="text-3xl text-center text-blue-700 mt-5 mb-4">Send message to telegram bot</div>
        <form action="{{ route('messages.send-message') }}" method="post" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                @error('title')
                    <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- ========= MESSAGE INPUT ======== --}}
            <div class="mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                <textarea id="message" rows="4" name="message"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
                @error('message')
                    <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- ========= LINK TIITLE INPUT ======== --}}
            <div class="mb-5">
                <label for="link_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Link Title
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </span>
                    <input type="text" id="link_title" name="link_title"
                        class="pl-10 shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter link title" />
                    @error('link_title')
                        <p class="text-red-500 mt-2 text-xs">{{ $message }}}</p>
                    @enderror
                </div>
            </div>

            {{-- ========= LINK URL INPUT ======== --}}
            <div class="mb-5">
                <label for="link_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Link URL
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </span>
                    <input type="url" id="link_url" name="link_url"
                        class="pl-10 shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="https://example.com" />
                    @error('link_url')
                        <p class="text-red-500 mt-2 text-xs">{{ $message }}}</p>
                    @enderror
                </div>
            </div>

            
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Send message</button>
        </form>

        @if (session('message'))
            <div class="p-4 mt-4  mx-auto max-w-sm text-sm rounded-lg bg-green-100 dark:bg-green-800" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-700 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-green-700 dark:text-green-300">{{ session('message') }}</span>
                </div>
            </div>
        @endif
    </div>

@endsection