@can('isAdmin')
    <nav class="admin-nav">
        <ul>
            <li>
                <a href="">Company</a>
            </li>
            <li>
                <a href="{{ route('crud_staff') }}">Staff</a>
            </li>
            <li>
                <a href="{{ route('gestione_user') }}">User</a>
            </li>
            <li>
                <a href="">FAQ</a>
            </li>
            <li>
                <a href="">Statistics</a>
            </li>
        </ul>
    </nav>
@endcan
