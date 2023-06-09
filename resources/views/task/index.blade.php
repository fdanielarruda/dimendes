@extends('template.layout')

@section('title_page', 'Tarefas')

@section('content')
   <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
            <tr>
               <th>Título</th>
               <th>Descrição</th>
               <th>Data de Criação</th>
               <th>Ações</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($tasks as $task)
               <tr>
                  <td>{{ $task->title }}</td>
                  <td>{{ $task->description }}</td>
                  <td>{{ date('d/m/Y H:i:s', strtotime($task->created_at)) }}</td>
                  <td>
							{{-- LINK FOR EDIT TASK --}}
							<a class="btn btn-warning btn-sm" title="Editar" href="{{ route('task.edit', $task->id) }}" style="float: left;">
								<i class="fas fa-fw fa-edit"></i>
							</a>
						
							{{-- LINK FOR DELETE TASK --}}
							<form action="{{ route('task.delete', $task->id) }}" method="POST" class="ml-2" style="float: left;">
                        @csrf
                        {{ method_field('DELETE') }}
                        
                        <button class="btn btn-danger btn-sm" title="Deletar" href="{{ route('task.delete', $task->id) }}">
                           <i class="fas fa-fw fa-trash"></i>
                        </button>
                     </form>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
