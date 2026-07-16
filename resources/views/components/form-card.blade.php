@props([
    'title' => 'Form',
    'action' => '#',
    'method' => 'POST',
    'submitText' => 'Simpan',
    'submitIcon' => null,
    'cancelRoute' => '#',
    'multipart' => false,
])

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $title }}</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $action }}" method="POST" {{ $multipart ? 'enctype="multipart/form-data"' : '' }}>
                @csrf
                @if ($method != 'POST')
                    @method($method)
                @endif

                {{ $slot }}

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">
                        @if ($submitIcon)
                            <i class="bi {{ $submitIcon }}"></i>
                        @endif
                        {{ $submitText }}
                    </button>
                    <a href="{{ $cancelRoute }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
