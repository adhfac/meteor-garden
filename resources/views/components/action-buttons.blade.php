@props([
    'editRoute' => null,
    'deleteRoute' => null,
    'id' => null,
    'showRoute' => null,
    'editLabel' => 'Edit',
    'deleteLabel' => 'Hapus',
    'showLabel' => 'Lihat',
    'deleteMessage' => 'Apakah Anda yakin ingin menghapus data ini?',
])

<div class="d-flex gap-1 flex-wrap">
    @if ($showRoute)
        <a href="{{ route($showRoute, $id) }}" class="btn btn-info btn-sm">
            <i class="bi bi-eye"></i> {{ $showLabel }}
        </a>
    @endif

    @if ($editRoute)
        <a href="{{ route($editRoute, $id) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> {{ $editLabel }}
        </a>
    @endif

    @if ($deleteRoute)
        <form action="{{ route($deleteRoute, $id) }}" method="POST" class="d-inline"
            onsubmit="return confirm('{{ $deleteMessage }}');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i> {{ $deleteLabel }}
            </button>
        </form>
    @endif
</div>
