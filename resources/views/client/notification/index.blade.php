@extends('client.layout.master')
@section('title', 'Thông báo')

@section('content')
    <div class="container">
        <div class="my-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông báo</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group list-group-flush list-group-hoverable" id="notification-list"
                                style="width: 500px">
                            </div>
                        </div>
                        <div class="col-md-9"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
