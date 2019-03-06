@extends('layouts.app')
@section('style')

<!-- Styles -->
<style>
    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
        color:cornflowerblue;
    }
    .full-height {
        height: 70vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="flex-center full-height">
    <div class="content ">
        <div class="title m-b-md">
            <p class="zoomInUp animated">Softball BC</p>
        </div>
        <h3>
            The official home of the British Columbia Amateur Softball Association
        </h3>
    </div>
</div>
@endsection