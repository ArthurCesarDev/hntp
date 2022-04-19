<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Page;
use App\Models\Link;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>[
            'login',
            'loginAction',
            'register',
            'registerAction',
            
        ]]);
    }
    public function login(request $request){
        return view('admin/login',[
            'error' => $request->session()->get('error')
        ]);
    }
    public function loginAction(Request $request){
        $creds = $request->only('email', 'password');
        if(Auth::attempt($creds)) {
            return redirect('/admin');
        }else {
            $request->session()->flash('error', 'Loja e/ou Senha Não conferem');
            return redirect('/admin/login');
        }

    }
    public function register(Request $request){
        return view('admin/register',[
            'error' => $request->session()->get('error')
        ]);
    
   }
      
   public function registerAction(Request $request) {
    $creds = $request->only('email', 'password'); 

    $hasEmail = User::where('email', $creds['email'])->count();

    if($hasEmail === 0) {

        $newUser = new User();
        $newUser->email = $creds['email'];
        $newUser->password = password_hash($creds['password'], PASSWORD_DEFAULT);
        $newUser->save();
        
        Auth::login($newUser);
        return redirect('/admin');
 
    }else {
        $request->session()->flash('error', 'Loja ja cadastrada.');
        return redirect('admin/register');
    }
 
   }

   public function logout(){
       Auth::logout();
       return redirect('/admin');
   }

   public function index() {
       $user = Auth::user();
       $pages = Page::where('id_user', $user->id)
       ->get();
    return view('admin/index',[
       'pages' => $pages
    ]);
  }





  public function pageLinks($slug){
    $user = Auth::user();
    $page = Page::where('slug', $slug)
    ->where('id_user', $user->id)
    ->first();

    if($page) {
        $links = Link::where('id_page', $page->id)
        ->get();
        return view('admin/page_links',[
            'menu' => 'links',
            'page' => $page,
            'links' => $links  
        ]);  
    }else {
        return redirect('/admin'); 
    }
   }
   public function pageDesing($slug){
    return view('admin/page_design',[
        'menu' => 'design'
    ]);

 }

 
 public function pageStats($slug){
    return view('admin/page_stats',[
        'menu' => 'stats'
    ]);

 }
 public function newLink($slug) {
    $user = Auth::user();
    $page = Page::where('id_user', $user->id)
    ->where('slug', $slug)
    ->first();

       if($page) {
        return view('admin/page_editlink',[
          'menu' => 'links',
          'page' =>  $page
         ]);

    } else {
        return redirect('/admin');
     }
  }
  public function newLinkAction($slug, Request $request) {
    $user = Auth::user();
    $page = Page::where('id_user', $user->id)
    ->where('slug', $slug)
    ->first();
       
    if($page) {
        
        $fields = $request->validate([
            'descricao' => ['required', 'min:2'],
            'sugestao' => ['required'],
            'producao' => ['required'],
            'sobra' => ['required']
        ]);

        $totalLinks = Link::where('id_page', $page->id)->count();

        $newLink = new Link();
        $newLink->id_page = $page->id;
        $newLink->orde = $totalLinks;
        $newLink->desc_1 = $fields['descricao'];
        $newLink->sug_1 = $fields['sugestao'];
        $newLink->prod_dia_1 = $fields['producao'];
        $newLink->sobra_dia_1 = $fields['sobra'];
        $newLink->save();

        return redirect('/admin/'.$page->slug.'/links');
 
  } else {
    return redirect('/admin');
        
    }

  }

  public function editLink($slug, $linkid){
    $user = Auth::user();
    $page = Page::where('id_user', $user->id)
    ->where('slug', $slug)
    ->first();

  if($page) {
      $link = Link::where('id_page', $page->id)
      ->where('id', $linkid)
      ->first();

      if($link) {
          return view('admin/page_editlink',[
          'menu' => 'links',
          'page' => $page,
          'link' => $link
 
          ]);

      }
  }
  return redirect('/admin');

  }
  public function editLinkAction($slug, $linkid, Request $request) {

    $user = Auth::user();
    $page = Page::where('id_user', $user->id)
    ->where('slug', $slug)
    ->first();

  if($page) {
      $link = Link::where('id_page', $page->id)
      ->where('id', $linkid)
      ->first();

      if($link) {
        $fields = $request->validate([
            'producao' => ['required'],
            'sobra' => ['required']
        ]);

        
        $link->producao = $fields['producao'];
        $link->sobra = $fields['sobra'];
        $link->save();

        return redirect('/admin/'.$page->slug.'/links');
      }
    }
  return redirect('/admin');

  }
}