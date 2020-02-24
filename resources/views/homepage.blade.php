@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div style="height: 100vh;" class="col-lg-12 d-flex align-items-center justify-content-center">
                <nav class="navbar navbar-light navbar-expand-lg bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/scrapper/profile/form">Profile scrapper</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/scrapper/followers/form">Follower count scrapper</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection