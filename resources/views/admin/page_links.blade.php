@extends('admin.page')

@section('body')

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Modificação
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      
      <table class="table">
  <thead >
      

    <tr>
      <th style="font-size:14px;" scope="col">Descrição</th>
      <th style="font-size:14px" scope="col">Produção</th>
      <th style="font-size:14px" scope="col">Sobrar</th>
      <th style="font-size:14px" scope="col">Alterar</th>
    </tr>
  </thead>
  <tbody id="links">
  @foreach($links as $link)
    <tr>
      <th style="font-size:14px;font-weight: normal;">{{$link->descricao}} <p style="color:red" >Susgestão do dia: {{$link->sugestao}}</p> </th>
      <td  >{{$link->producao}}</td>
      <td>{{$link->sobra}}</td>
      <td><a href="{{url('/admin/'.$page->slug.'/editlink/'.$link->id)}}"><button type="button" class="btn btn-outline-primary btn-sm">Editar</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
      </div>
    </div>
  </div>






  






@endsection