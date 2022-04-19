@extends('admin.template')

@section('Title Medida Certa - Links')

@section('content')

<div class="container">
    <div class="preheader">
       Loja: {{$page->title}}
    </div>

    
    <div class="area">
       <div class="leftside"> 
          <header>
             
               
              <p @if ($menu='links') class="active" @endif><a style="text-decoration:none" href="{{url('/admin/'.$page->slug.'/links')}}">Página Medida</a></p>
              
         
        </header>
        </div>
        @yield('body')
           </div>
           <div class="rightside">

           </div>
    </div>
    
@endsection