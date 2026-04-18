<form action="{{ $url }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit"
        style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 0.75rem; font-size: 0.875rem; font-weight: 500; border-radius: 0.5rem; border: 1px solid #fecaca; color: #dc2626; background-color: transparent; cursor: pointer; transition: all 0.2s;">
        <svg xmlns="http://www.w3.org/2000/svg" style="height: 1rem; width: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        Delete
    </button>
</form>
