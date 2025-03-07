<x-app-layout>
    <div class="overflow-hidden bg-white shadow-sm p-14 sm:ml-64 sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('article.update', $article->slug) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="title" id="title"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('title', $article->title) }}" required>
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="editor" class="block text-sm font-medium text-gray-700">Konten</label>
                    <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm min-h-[300px]">
                        {!! $article->content !!}
                    </div>
                    <input type="hidden" name="content" id="content" value="{{ old('content', $article->content) }}">
                    @error('content')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid items-center grid-cols-3">
                    <div class="mb-4">
                        <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured
                            Image</label>
                        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="">
                        @error('featured_image')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="visibility" class="block text-sm font-medium text-gray-700">Visibility</label>
                        <select name="visibility" id="visibility">
                            <option value="public" {{ $article->visibility == 'public' ? 'selected' : '' }}>
                                Public</option>
                            <option value="private" {{ $article->visibility == 'private' ? 'selected' : '' }}>
                                Private</option>
                        </select>
                        @error('visibility')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category" id="category">
                            <option value="umum" {{ $article->category == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="kesehatan_mental" {{ $article->category == 'kesehatan_mental' ? 'selected' : '' }}>Mental</option>
                            <option value="gizi_nutrisi" {{ $article->category == 'gizi_nutrisi' ? 'selected' : '' }}>Gizi dan Nutrisi</option>
                            <option value="penyakit" {{ $article->category == 'penyakit' ? 'selected' : '' }}>Penyakit</option>
                            <option value="seksual_reproduksi" {{ $article->category == 'seksual_reproduksi' ? 'selected' : '' }}>Seksual dan Reproduksi</option>
                            <option value="tips_kesehatan" {{ $article->category == 'tips_kesehatan' ? 'selected' : '' }}>Tips Kesehatan</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('article.index') }}"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-gray-300 border border-transparent rounded-md hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25">
                        Kembali
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'direction': 'rtl'
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                },
                placeholder: 'Tulis konten artikel di sini...',
            });

            // Populate from old value if exists
            @if (old('content'))
                quill.root.innerHTML = {!! json_encode(old('content')) !!};
            @endif

            // Update hidden input when editor content changes
            quill.on('text-change', function() {
                document.getElementById('content').value = quill.root.innerHTML;
            });

            // Ensure form submission captures editor content
            document.querySelector('form').addEventListener('submit', function() {
                document.getElementById('content').value = quill.root.innerHTML;
            });

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
    </script>
</x-app-layout>
