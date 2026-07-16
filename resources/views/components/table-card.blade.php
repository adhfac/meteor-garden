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
