@props([
    'title' => 'Data',
    'headers' => [],
    'createRoute' => null,
    'createText' => 'Tambah Baru',
    'emptyMessage' => 'Belum ada data yang tersedia.',
    'actions' => true,
])

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ $title }}</h4>
            @if ($createRoute)
                <a href="{{ $createRoute }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> {{ $createText }}
                </a>
            @endif
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-custom align-middle">
                    <thead class="table-dark">
                        <tr>
                            @foreach ($headers as $header)
                                <th {{ isset($header['width']) ? 'width="' . $header['width'] . '"' : '' }}>
                                    {{ $header['label'] }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
