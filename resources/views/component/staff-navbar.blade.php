<nav class="staff-nav">
    <ul>
        <li>
            <a href="{{route('staffProfile', [$utente -> username])}}">Profilo</a>
        </li>
        <li>
            <a href="{{route('staffPassword', [$utente -> username])}}" >Password</a>
        </li>
        <li>
            <a href="{{route('crud_offerte', [$utente->username])}}">Offerte</a>
        </li>
        <li>
            <a href="">Offerte Abbinate</a>
        </li>
    </ul>
</nav>
