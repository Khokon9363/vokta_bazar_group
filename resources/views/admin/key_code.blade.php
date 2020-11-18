@extends('admin.master')
@section('content')

    <div class="container">
        <div class="row" style="margin-top: 200px;">
            <div class="col-sm-4 m-auto">
                <div class="form-group">
                    <label for="key">Enter your key code here !</label>
                    <h4 class="text-danger">{{session('key_code_error')}}</h4>
                    <form action="/send/key_code" method="post">
                    @csrf
                    <input type="text" name="key_code" placeholder="Example : 12345-vokta_bazar_group-12345" class="form-control" id="key">
                    <input type="submit" value="Try to match this key" class="btn btn-success mt-3">
                    </form>
                </div><hr/>
                <div style="color: red;">
                    <ul>
                        <li>Rules</li>
                        <li>Rules</li>
                        <li>Rules</li>
                        <li>Rules</li>
                        <li>Rules</li>
                        <li>Rules</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
