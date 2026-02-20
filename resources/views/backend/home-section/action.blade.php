<div class="d-flex gap-2">
    <a href="{{ route('home-sections.edit', $section->id) }}" class="btn btn-info btn-sm" title="Edit">
        <i class="uil uil-pen"></i> Edit
    </a>
    <form action="{{ route('home-sections.destroy', $section->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this section?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
            <i class="uil uil-trash"></i> Delete
        </button>
    </form>
</div>
