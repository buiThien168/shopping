@if ($valueCategory->CategoryChildent->count())
    <ul role="menu" class="sub-menu">
        @foreach ($valueCategory->CategoryChildent as $ItemChild)
            <li>
                <a href="{{ route('category.user', ['id' => $ItemChild->id]) }}">{{ $ItemChild->name }}</a>
                @if ($ItemChild->CategoryChildent->count())
                    @include('user.components.child_menu', [
                        'valueCategory' => $ItemChild,
                    ])
                @endif
            </li>
        @endforeach
    </ul>
@endif
