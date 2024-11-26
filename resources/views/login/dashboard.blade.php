<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@if (Auth::user()->hasRole('admin'))
        <h1>Welcome Admin! <span class="text-red-500">{{ Auth::user()->name }}</span></h1>
        <div class="mx-auto">
            <div x-data="{open: false}" class="text-center">
                <button @click="open=true" class="text-center bg-blue-500 text-white py-2 px-2">
                    Add Event
                </button>
                <div x-show = "open" class ="fixed inset-0 flex items-center justify-center bg-black opacity-50 z-50">
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg max-w-auto mx-auto border-2 border-black h-[280px]">
                        <div class="flex justify-between items-center">
                            <p class="text-xl font-bol text-white">Add Event</p>
                            <button @click="open = false" class="text-white">X</button>
                        </div>
                        <form action="{{route('admin.add_event')}}" class="mt-5" method="post">
                            @csrf
                            <div>
                                <label for="event_name" class="flex justify-start text-white">Event</label>
                                <input type="text" name="event_name" id="event_name" value="{{old('event_name')}}"
                                class="shadow appearance-none rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('event_name') is-invalid @enderror" required>
                            </div>

                            <div>
                                <label for="event_description" class="flex justify-start text-white">Event Description</label>
                                    <input type="text" name="event_description" id="event_description" value="{{old('event_description')}}"
                                    
                                    class="shadow appearance-none rounded w-full py-2 px-3 text-black leading-tight focus:outline-none  text focus:shadow-outline @error('event_description') is-invalid @enderror" required>
                            </div>

                            <button type="submit" class="w-full my-3 py-2 bg-gray-500 hover:text-white hover:bg-gray-700">Add</button>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        @elseif(Auth::user()->hasRole('registrar'))
        <h1>Welcome Registrar! {{ Auth::user()->name }}</h1>
        @elseif(Auth::user()->hasRole('faculty'))
        <h1>Welcome Faculty! {{ Auth::user()->name }}</h1>
        @endif
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link href="route ('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{('Log Out') }}
            </x-dropdown-link>
        </form>
</body>
</html>

        



