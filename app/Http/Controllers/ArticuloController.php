<?php

namespace App\Http\Controllers; 

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articulo.listaArticulos',[
            'articulos'=> Articulo::get()]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.crearArticulo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'numero_parte'=>['required','unique:tb_articulos'],
            'numero_parte_old'=>'required',
            'tipo'=>'required',
            'descripcion'=>['required'],
            'ubicacion'=>'required',
            'critico'=>'required',
            'obsoleto'=>'required',
            'categoria'=>'required',
            'precio'=>'required|numeric',
            'inventario'=>'required|numeric',
            'imagen'=>[
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'

            ],
        ]);

// creando imagen
        $nombre=$request->numero_parte.'.'.$request->file('imagen')->extension();
        $pathOriginal = public_path('img/original/').$request->tipo;
        $pathResize = public_path('img/resize/').$request->tipo;
        // moviendo imagen a la carpeta original
        $request->imagen->move($pathOriginal,$nombre);

        $pathOr = explode('mro',$pathOriginal,4);
        $pathOr=$pathOr[1];
        $pathRe = explode('mro',$pathResize,4);
        $pathRe=$pathRe[1];

        // resize image to new width
        $img = Image::make($pathOriginal.'/'.$nombre)->widen(100);
        $img->save($pathResize.'/'.$nombre,90);

        Articulo::create ([
            'numero_parte' => $request['numero_parte'],
            'numero_parte_old' => $request['numero_parte_old'],
            'tipo' => $request['tipo'],
            'descripcion' => strtoupper($request['descripcion']),
            'ubicacion' => $request['ubicacion'],
            'precio' => $request['precio'],
            'critico' => $request['critico'],
            'obsoleto' => $request['obsoleto'],
            'categoria' => $request['categoria'],
            'inventario' => $request['inventario'],
            'ruta' => $pathOr.'/'.$nombre,
            'rutaResize' => $pathRe.'/'.$nombre,
        ]);
        
        return redirect()->route('listaArticulos')->with('status','El articulo fue creado con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulo.articulo',[
            'articulo'=> $articulo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(articulo $articulo)
    {
        request()->validate([
            'numero_parte'=>['required',
            Rule::unique('tb_articulos')->ignore($articulo)],
            'numero_parte_old'=>'required',
            'tipo'=>'required|min:3',
            'descripcion'=>['required'],
            'ubicacion'=>'required',
            'categoria'=>'required',
            'precio'=>'required|numeric',
            'inventario'=>'required|numeric',
            'critico'=>'required',
            'imagen'=>[
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
        ]);

            $request= request();
            if(!request('imagen')==null)
            {
                // creando imagen
                $nombre=$request->numero_parte.'.'.$request->file('imagen')->extension();
                $pathOriginal = public_path('img/original/').$request->tipo;
                $pathResize = public_path('img/resize/').$request->tipo;
                // moviendo imagen a la carpeta original
                $request->imagen->move($pathOriginal,$nombre);

                $pathOr = explode('mro',$pathOriginal,4);
                $pathOr=$pathOr[1];
                $pathRe = explode('mro',$pathResize,4);
                $pathRe=$pathRe[1];

                // resize image to new width
                $img = Image::make($pathOriginal.'/'.$nombre)->widen(100);
                $img->save($pathResize.'/'.$nombre,90);

                $rutaOr=$pathOr.'/'.$nombre;
                $rutaRe =$pathRe.'/'.$nombre;
            }
            else
            {
                $rutaOr=$articulo['ruta'];
                $rutaRe=$articulo['rutaResize'];
            }

            $articulo->update([
                'numero_parte' => $request['numero_parte'],
                'numero_parte_old' => $request['numero_parte_old'],
                'tipo' => $request['tipo'],
                'descripcion' => strtoupper($request['descripcion']),
                'ubicacion' => $request['ubicacion'],
                'precio' => $request['precio'],
                'critico' => $request['critico'],
                'obsoleto' => $request['obsoleto'],
                'categoria' => $request['categoria'],
                'inventario' => $request['inventario'],
                'ruta' => $rutaOr,
                'rutaResize' => $rutaRe,
            ]);
            return redirect()->route('listaArticulos')->with('status','El articulo fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete(); 
        return redirect()->route('listaArticulos')->with('status','El articulo fue eliminado con exito');
    }
}
