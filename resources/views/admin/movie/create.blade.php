<x-app-layout>
    <x-slot name="header">
        Create movie
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.movies.store') }}">
                        @csrf
                        <div>
                            <x-label class="block text-sm text-gray-600" for="name">Movie title</x-label>
                            <x-input id="name" class="block w-full mt-1" name="title" type="text" required/>
                            @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-label for="description">Movie description</x-label>
                            <textarea id="description" class="block w-full mt-1" name="description"  rows="6">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-label>Movie categories</x-label>
                            @foreach ($categories as $category)
                                <div style="display: flex;margin-top: 20px;">
                                    <div style="width:100px;line-height: 20px;">
                                        <input type="checkbox" id="item{{$category->id}}" name="categories[]" value="{{$category->id}}">
                                        <label for="item{{$category->id}}">{{$category->name}}</label><br>
                                    </div>
                                    <div style="width:200px;margin-left: 10px;">
                                        <input type="text" placeholder="Rate" name="rates[{{$category->id}}]" value=""/>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <x-button>ADD MOVIE TITLE</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

