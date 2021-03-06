@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Смена
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('duties.show_fields')
                    <a href="{!! route('duties.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('duties.orders.index', $duties->id) !!}" class="btn btn-primary">Наряды</a>
                </div>
            </div>
        </div>
    </div>
@endsection
