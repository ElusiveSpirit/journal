@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Наряд
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orders, ['route' => ['duties.orders.update', $duty->id, $orders->id], 'method' => 'patch']) !!}

                        @include('orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection