        <nav id="principal">
            <ul>
                <li>
                <a href="{{ route('user.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('institution.index')}}">
                        <i class="fas fa-building"></i>
                        <p>Instituições</p>
                    </a>
                </li>
                <li>
                <a href="{{ route('group.index') }}">
                        <i class="fa fa-users"></i>
                        <p>Grupos</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('moviment.application') }}">
                        <i class="fa fa-money-check-alt"></i>
                        <p>Investir</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('moviment.index') }}">
                        <i class="fa fa-hand-holding-usd"></i>
                        <p>Aplicações</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('moviment.all') }}">
                        <i class="fa fa-file-invoice-dollar"></i>
                        <p>Extrato</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('moviment.getback') }}">
                        <i class="fa fa-money-bill-alt"></i>
                        <p>Resgatar</p>
                    </a>
                </li>
            </ul>
        </nav>