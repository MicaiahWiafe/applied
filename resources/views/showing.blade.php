@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Showing Now</div>

                <div class="panel-body row">
                     <ul class="row" style="list-style: none;">
                        <li class="col-sm-3">
                            <a href=""><img src="/img/Logan.jpg" width="113" height="170" alt="Logan"></a>
                            <h5>
                                <a href="">Logan</a>
                            </h5>
                        </li>
                        <li class="col-sm-3">
                            <a href=""><img src="/img/beauty.jpeg" width="113" height="170" alt="Logan"></a>
                            <h5>
                                <a href="">Beauty and the Beast</a>
                            </h5>
                        </li>
                        <li class="col-sm-3">
                            <a href=""><img src="/img/bossbaby.jpeg" width="113" height="170" alt="Logan"></a>
                            <h5>
                                <a href="">Boss Baby</a>
                            </h5>
                        </li>
                        <li class="col-sm-3">
                            <a href=""><img src="/img/johnwick.jpeg" width="113" height="170" alt="Logan"></a>
                            <h5>
                                <a href="">John Wick</a>
                            </h5>
                        </li>
                        <li class="col-sm-3">
                            <a href=""><img src="/img/kong.jpeg" width="113" height="170" alt="Logan"></a>
                            <h5>
                                <a href="">Kong</a>
                            </h5>
                        </li>
                        <li class="col-sm-3">
                            <a href=""><img src="/img/moana.jpeg" width="113" height="170" alt="Moana"></a>
                            <h5>
                                <a href="">Moana</a>
                            </h5>
                        </li>
                    </ul>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

