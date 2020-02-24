@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div style="height: 100vh;" class="col-lg-12 d-flex align-items-center justify-content-center">
                <form action="{{ $action }}">
                    <div class="form-group">
                        <label for="web-link-field">Profile to parse</label>
                        <input type="text" class="form-control" name="profile" id="web-link-field" placeholder="www.example.com">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Parse"/>
                </form>
            </div>
        </div>
    </div>
@endsection
