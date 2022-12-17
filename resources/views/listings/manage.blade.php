@extends("layout")
@section("content")
    @include("partials._search")
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
            @unless($listings->isEmpty())
                @foreach($listings as $listing)
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="{{route('listings.show',$listing->id)}}">
                                {{$listing->title}}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="{{route('listings.edit',$listing->id)}}"
                                class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edit</a
                            >
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form action="{{route("listings.delete",$listing->id)}}" method="post">
                                @method("delete")
                                @csrf
                                <button class="text-red-500"><i class="fa-solid fa-trash">Delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
            </tbody>
        </table>
        @endunless
    </x-card>
@endsection
