@extends('posts.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example for Rolling Code</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Crear Nuevo Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Mostrar</a>    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Editar</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection