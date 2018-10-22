<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>

<!-- jQuery -->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/site.css') }}">

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('createPartie') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('menu.parties')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('createPartie') }}">@lang('menu.creerPartie')</a>
                    <a class="dropdown-item" href="{{ route('getAllPartie') }}">@lang('menu.toutesLesParties')</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('createJeu',0) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('menu.jeux')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('createJeu',0) }}">@lang('menu.creerJeu')</a>
                    <a class="dropdown-item" href="{{ route('getAllJeu') }}">@lang('menu.toutLesJeux')</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('pageRecherche') }}">@lang('menu.recherche')</a>
                </div>
            </li>
            @if(Auth::User()->hasRole('admin'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('menu.admin')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('listUser') }}">@lang('menu.userManagement')</a>
                        <a class="dropdown-item" href="{{ route('listJoueur') }}">@lang('menu.joueurManagement')</a>
                    </div>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item">
                    <span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</nav>
<div class="offset-lg-1 col-lg-10">
    @yield('contenu')
</div>
<div class="modal offset-sm-3 col-sm-6" id="editModal" role="dialog">
    <div class="modal-content">
        <form id="editModalForm" method="post" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="editModal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">@lang('contents.saveButton')</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('contents.cancelButton')</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.dropdown-toggle').dropdown()

    function showFormModal(modalLoadRoute, modalResultRoute, title) {
        $('#editModalForm').attr('action',modalResultRoute);
        $('#editModalTitle').html(title);
        $.ajax({
            type: 'get',
            url: modalLoadRoute,
            dataType: "html",
            contentType: "html",
        }).done(function (response, textStatus, jqXHR) {
            $(".editModal-body").html(response);
        });
        $('#editModal').modal('show');
    }
</script>
</body>
</html>