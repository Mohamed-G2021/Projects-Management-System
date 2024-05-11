<div class="btn-group" role="group" aria-label="{{ __('words.user_actions') }}">
    <a href="{{ route('employees.show', $id) }}" class="btn btn-info btn-sm" title="{{ __('words.show') }}">
        {{ __('words.show') }}
    </a>
    <a href="{{ route('employees.edit', $id) }}" class="btn btn-primary btn-sm" title="{{ __('words.edit') }}">
        {{ __('words.edit') }}
    </a>
    <form action="{{ route('employees.destroy', $id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="{{ __('words.delete') }}" onclick="return confirm('{{ __('words.confirm_delete_employee') }}')">
            {{ __('words.delete') }}
        </button>
    </form>

    <a href="{{ route('employee-projects.create', $id) }}" class="btn btn-success btn-sm" title="{{ __('words.assign_projects') }}"  style="white-space: nowrap;" >
        {{ __('words.assign_projects') }}
    </a>
</div>
