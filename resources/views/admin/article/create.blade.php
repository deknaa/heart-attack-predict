<x-app-layout>
<div class="p-14 sm:ml-64">
    <h1 class="text-xl font-bold">Create an Article</h1>
    <p class="text-sm">This page for creating an article</p>

    <form action="{{ route('article.store') }}" method="POST">
        @csrf
        
        <div class="mt-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Title Article" name="title" required />
                <div class="font-bold text-red-600">@error('title') {{ $message }} @enderror</div>
        </div>

        <label for="content" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
        <input type="hidden" name="content" id="content">
        <div id="editor" style="height: 300px;"></div>

        <div class="font-bold text-red-600">@error('content') {{ $message }} @enderror</div>
        <button type="submit"
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 mt-5">
            Publish post
        </button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Update input hidden dengan nilai dari Quill saat form dikirim
        document.querySelector("form").onsubmit = function() {
            document.querySelector("#content").value = quill.root.innerHTML;
        };
    });
</script>
</x-app-layout>