<x-app>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())

            <x-blog-grid :posts="$posts" />

        @else

            <p class="text-center text-yellow-500 font-bold" >No posts available yet.</p>

        @endif
    </main>
</x-app>
