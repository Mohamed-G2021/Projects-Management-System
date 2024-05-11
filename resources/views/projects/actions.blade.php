<div class="btn-group" role="group" aria-label="{{ __('words.user_actions') }}">
    <a href="{{ route('projects.show', $id) }}" class="btn btn-info btn-sm" title="{{ __('words.show') }}">
        {{ __('words.show') }}
    </a>
    <a href="{{ route('projects.edit', $id) }}" class="btn btn-primary btn-sm" title="{{ __('words.edit') }}">
        {{ __('words.edit') }}
    </a>
    <form action="{{ route('projects.destroy', $id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="{{ __('words.delete') }}" onclick="return confirm('{{ __('words.confirm_delete_project') }}')">
            {{ __('words.delete') }}
        </button>
    </form>
</div>
