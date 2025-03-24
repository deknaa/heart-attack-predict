<x-app-layout>
    <div class="max-w-5xl px-4 py-8 mx-auto bg-white rounded-lg shadow-sm sm:px-6 lg:px-8 sm:py-12">
        <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Edit Article</h1>
            <a href="{{ route('article.index') }}" class="flex items-center text-indigo-600 hover:text-indigo-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Back to Articles
            </a>
        </div>

        <form action="{{ route('article.update', $article->slug) }}" enctype="multipart/form-data" method="POST"
            class="space-y-6">
            @method('PUT')
            @csrf

            <!-- Title Field -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content Editor -->
            <div>
                <label for="editor" class="block text-sm font-medium text-gray-700">Konten</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm min-h-[300px]">
                    {!! $article->content !!}
                </div>
                <input type="hidden" name="content" id="content" value="{{ old('content', $article->content) }}">
                @error('content')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-xs text-gray-500">You can upload images by clicking the image icon in the toolbar
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- Featured Image -->
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Featured Image</label>
                    <div class="relative mt-2">
                        <div
                            class="overflow-hidden bg-gray-100 border border-gray-300 rounded-md aspect-w-16 aspect-h-9">
                            <img id="featured-image-preview" src="{{ asset('storage/' . $article->featured_image) }}"
                                alt="Featured image" class="object-cover w-full h-auto">
                        </div>
                        <div class="mt-2">
                            <label for="featured_image"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Change Image
                                <input id="featured_image" name="featured_image" type="file" class="sr-only"
                                    accept="image/*" onchange="previewImage()">
                            </label>
                        </div>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Visibility -->
                <div class="md:col-span-1">
                    <label for="visibility" class="block text-sm font-medium text-gray-700">Visibility</label>
                    <select name="visibility" id="visibility"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="public" {{ $article->visibility == 'public' ? 'selected' : '' }}>Public</option>
                        <option value="private" {{ $article->visibility == 'private' ? 'selected' : '' }}>Private
                        </option>
                    </select>
                    @error('visibility')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="md:col-span-1">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="umum" {{ $article->category == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="kesehatan_mental"
                            {{ $article->category == 'kesehatan_mental' ? 'selected' : '' }}>Kesehatan Mental</option>
                        <option value="gizi_nutrisi" {{ $article->category == 'gizi_nutrisi' ? 'selected' : '' }}>Gizi
                            dan Nutrisi</option>
                        <option value="penyakit" {{ $article->category == 'penyakit' ? 'selected' : '' }}>Penyakit
                        </option>
                        <option value="seksual_reproduksi"
                            {{ $article->category == 'seksual_reproduksi' ? 'selected' : '' }}>Seksual dan Reproduksi
                        </option>
                        <option value="tips_kesehatan" {{ $article->category == 'tips_kesehatan' ? 'selected' : '' }}>
                            Tips Kesehatan</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end pt-5 space-x-3 border-t border-gray-200">
                <a href="{{ route('article.index') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Article
                </button>
            </div>
        </form>
    </div>
    <script>
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            ['link', 'image', 'video', 'formula'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }, {
                'list': 'check'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];
        
        document.addEventListener('DOMContentLoaded', function() {
            if (!document.getElementById('editor').classList.contains('ql-container')) {
                const quill = new Quill('#editor', {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow',
                    placeholder: 'Tulis konten artikel di sini...',
                });

                // Populate editor with old content if exists
                let oldContent = @json(old('content', $article->content));
                if (oldContent) {
                    quill.root.innerHTML = oldContent;
                }

                // Update hidden input
                quill.on('text-change', function() {
                    document.getElementById('content').value = quill.root.innerHTML;
                });

                document.querySelector('form').addEventListener('submit', function() {
                    document.getElementById('content').value = quill.root.innerHTML;
                });
            }

            // Handle image upload
            var toolbar = quill.getModule('toolbar');
            toolbar.addHandler('image', function() {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = function() {
                    var file = input.files[0];
                    if (file) {
                        var formData = new FormData();
                        formData.append('image', file);
                        formData.append('_token', '{{ csrf_token() }}');

                        // Upload to server
                        fetch('{{ route('image.upload') }}', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.success) {
                                    // Insert image into editor
                                    const range = quill.getSelection();
                                    quill.insertEmbed(range.index, 'image', result.url);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                };
            });
        });

        // Preview featured image
        function previewImage() {
            const fileInput = document.getElementById('featured_image');
            const preview = document.getElementById('featured-image-preview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</x-app-layout>
