<x-app>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    Create a new post
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/admin/posts/create" method="POST">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                            Title
                        </label>
                        <div class="mt-2">
                            <input id="title" name="title" type="text" required value="{{ old('title') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('title')
                            <x-error :message="$message" />
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">
                            Slug
                        </label>
                        <div class="mt-2">
                            <input id="slug" name="slug" type="text" required value="{{ old('slug') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('slug')
                            <x-error :message="$message" />
                        @enderror
                    </div>

                    <div>
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">
                            Excerpt
                        </label>
                        <div class="mt-2">
                            <textarea name="excerpt" class="w-full text-sm outline-none rounded focus:ring" rows="3" required>
                                {{ old('excerpt') }}
                            </textarea>
                        </div>
                        @error('excerpt')
                            <x-error :message="$message" />
                        @enderror
                    </div>

                    <div>
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">
                            Body
                        </label>
                        <div class="mt-2">
                            <textarea name="body" class="w-full text-sm outline-none rounded focus:ring" rows="3" required>
                                {{ old('body') }}
                            </textarea>
                        </div>
                        @error('body')
                            <x-error :message="$message" />
                        @enderror
                    </div>

                    <div>
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">
                            Category
                        </label>
                        <div class="mt-2">
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp
                            <select name="category_id" class="w-full text-sm outline-none rounded focus:ring" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : ''  }}
                                    >{{ $category->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <x-error :message="$message" />
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Create
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    <a href="/" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Back home</a>
                </p>
            </div>
        </div>

    </main>
</x-app>
