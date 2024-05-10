<div class="btn-group" role="group" aria-label="User Actions">
    <a href="{{ route('employees.show', $id) }}" class="btn btn-info btn-sm" title="Show">
        Show
    </a>
    <a href="{{ route('employees.edit', $id) }}" class="btn btn-primary btn-sm" title="Edit">
        Edit
    </a>
    <form action="{{ route('employees.destroy', $id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this employee?')">
            Delete
        </button>
    </form>

    <a href="{{ route('employee-projects.create', $id) }}" class="btn btn-primary btn-sm" title="assign projects">
        Assign
    </a>
</div>
