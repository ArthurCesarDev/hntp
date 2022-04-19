@extends('admin.template')
 

@section('title', 'Medida - Certa')

@section('content')

<div class="container">
@foreach($pages as $page)
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
<p class="breadcrumb-item active" aria-current="page">Loja {{$page->title}}</p>
  <ol style="margin-top:20px" class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Setor: {{$page->slug}}</li>
    <li style="margin-left:40px" class="breadcrumb-item"><a href="{{url('/admin/'.$page->slug.'/links')}}">Vamos Lá</a></li>
  </ol>
</nav>
@endforeach
</div>


@endsection