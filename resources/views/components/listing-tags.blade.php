@php
   $tags = explode(",",$listingTags)
@endphp
<ul class="flex">
    @foreach($tags as $tag)

        <li
            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            <a href="/?tag={{trim($tag)}}">{{trim("$tag")}}</a>
        </li>
    @endforeach
</ul>
