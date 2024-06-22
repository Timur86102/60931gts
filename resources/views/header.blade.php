<header>
    <nav class="navbar navbar-expand-md border-bottom fixed-top bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('project')}}">Task manager</a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('project')}}">Проекты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('task')}}">Задачи</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link active" href="#"><i class="fa fa-user fa-lg"></i> {{ Auth::user()->name }}</a>
                    <a class="btn btn-outline-light my-2 my-sm-0" href="{{url('logout')}}">Выйти</a>
                </ul>
            </div>
        </div>
    </nav>
</header>