@extends('admin.page')


@section('body')

 <div class="cotainer">
 <h4>{{isset($link) ? 'Editar Medida' : 'Nova Medida'}}</h4>

 <form method="POST">
       @csrf
 <div>
 <label for="exampleFormControlInput1" class="form-label">Descrição</label>
 <input class="form-control form-control-sm" type="text" name="descricao" value="{{$link->descricao ??  ''}}" placeholder="Disabled input" aria-label="Disabled input example" disabled>
 </div>

 <div>
 <label for="exampleFormControlInput1" class="form-label">Sugestão do dia</label>
 <input class="form-control form-control-sm" type="text" name="sugestao" value="{{$link->sugestao ?? ''}}" placeholder="Disabled input" aria-label="Disabled input example" disabled>
 </div>
 <div>
 <label for="exampleFormControlInput1" class="form-label">Produção do dia</label>
 <input class="form-control form-control-sm" type="text" name="producao" value="{{$link->producao ?? ''}}" placeholder="" aria-label=".form-control-sm example">
 </div>
 <div>
 <label for="exampleFormControlInput1" class="form-label">Sobra do dia</label>
 <input class="form-control form-control-sm" type="text" name="sobra" value="{{$link->sobra ?? ''}}" placeholder="" aria-label=".form-control-sm example">
 </div>
 <label>
          
         <input style="margin-top:10px" type="submit" valeu="Salvar"> 
   </label>
   


</form>
 </div>

@endsection