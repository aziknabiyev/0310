<x-app-layout>
    <x-slot name="header">
        Categories list
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="mb-4">
                        <x-link :href="route('admin.categories.create')">Create</x-link>
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                #
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Name
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Movies
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Rate
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200" style="text-align: center;">{{ $category->id }}</td>
                                <td class="px-6 py-4 border-b border-gray-200" style="text-align: center;">{{ $category->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200" style="text-align: center;">
                                    @foreach($category->movies as $movie)
                                        {{$movie->title}}
                                        @if($loop->iteration!=$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200" style="text-align: center;">
                                    @foreach($category->movies as $movie)
                                        {{$movie->pivot->rate}}
                                        @if($loop->iteration!=$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200" style="text-align: center;">
                                    <x-nav-link :href="route('admin.categories.edit', $category->id)">
                                        Edit
                                    </x-nav-link>

                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" style="color: red;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
