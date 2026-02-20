<div class="d-flex gap-2">
    <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-info btn-sm" title="Edit">
        <i class="uil uil-pen"></i> Edit
    </a>
    <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this certificate?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
            <i class="uil uil-trash"></i> Delete
        </button>
    </form>
</div>
