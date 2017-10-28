@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Arms
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($arms, ['route' => ['arms.update', $arms->id], 'method' => 'patch']) !!}

                        @include('arms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection