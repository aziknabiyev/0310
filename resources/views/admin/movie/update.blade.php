<x-app-layout>
    <x-slot name="header">
        Update movie
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.movies.update',$movie->id) }}">
                        @method('PUT')

                        @csrf
                        <div>
                            <x-label class="block text-sm text-gray-600" for="name">Movie title</x-label>
                            <x-input id="name" class="block w-full mt-1" value="{{$movie->title}}" name="title" type="text" required/>
                            @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-label for="description">Movie description</x-label>
                            <textarea id="description" class="block w-full mt-1" name="description"  rows="6">{{$movie->description}}</textarea>
                            @error('description')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-label>Movie categories</x-label>
                            @php
                            $arr=[];
                            @endphp
                            @foreach($postCategories as $it)
                                @php
                                $arr[$it->id]=$it->pivot->rate;
                                @endphp
                            @endforeach
                            @foreach ($categories as $category)
                                <div style="display: flex;margin-top: 20px;">
                                    <div style="width:100px;line-height: 20px;">
                                        <input
                                            @isset($arr[$category->id])
                                                checked
                                            @endisset
                                            type="checkbox" id="item{{$category->id}}" name="categories[]" value="{{$category->id}}">
                                        <label for="item{{$category->id}}">{{$category->name}}</label><br>
                                    </div>
                                    <div style="width:200px;margin-left: 10px;">
                                        <input type="text"
                                               @isset($arr[$category->id])
                                               value="{{$arr[$category->id]}}"
                                               @endisset
                                               placeholder="Rate" name="rates[{{$category->id}}]" value=""/>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <x-button>UPDATE MOVIE</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

