<?php

namespace App\Http\Controllers;

use App\Maleza;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusquedaController extends Controller
{


    private $size;

    public function __construct()
    {
        $this->size=16;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tipo = $request->tipo;


        if($tipo == "invitado"){
            return view("busqueda.invitado");
        }else{
            return view("busqueda.usuario");
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //

        $maleza = Maleza::find($id);
        $activos = $maleza->activos()->get();

        if(isset($request->tipo) && $request->tipo == "admin"){
            return view("busqueda.detalle_admin")->with("parametros",array("maleza"=>$maleza, "activos"=>$activos));
        }else{
            return view("busqueda.detalle")->with("parametros",array("maleza"=>$maleza, "activos"=>$activos));
        }


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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function buscar(Request $request){

        $imagen = $request->file('imagen');
        $malezas = Maleza::all();
        $dir = "img/maleza/buscadas";

        $nuevo_nombre = md5(date("Y-m-d-i-s")."".$imagen->getClientOriginalName()).".".$imagen->getClientOriginalExtension();

        $imagen->move($dir,$nuevo_nombre);

        $array_resultados = array();
        $array_resultados_img = array();
        $array_resultados_nombres = array();

        foreach($malezas AS $maleza){

           $fotos = $maleza->fotos()->where("tipo","COMPARABLES")->get();
            $array_porcentaje = array();
            $array_imagenes = array();


if(!empty($fotos[0])) {
    foreach ($fotos AS $foto) {

        $f1 = $foto->ruta;
        $f2 = $dir . "/" . $nuevo_nombre;

        $hash = $this->getHash_img($f1);
        $dif = $this->comparar_imgs($f1, $f2);

        $diferencia = (100 - $dif);

        $array_porcentaje[] = $diferencia;
        $array_imagenes[] = $f1;


    }
    $array_resultados_nombres[$maleza->id] = array("comun" => $maleza->nombre_comun, "cientifico" => $maleza->nombre_cientifico);
    $array_resultados_img[$maleza->id] = $array_imagenes;
    //$array_resultados[$maleza->id] = (array_sum($array_porcentaje) / count($array_porcentaje));
    $array_resultados[$maleza->id] = max($array_porcentaje);
}

        }
        arsort($array_resultados);


        if(isset($request->tipo) && $request->tipo == "admin"){
            return view("busqueda.resultado_admin")->with("parametros", array(
                "porcentajes"=> $array_resultados,
                "imagenes" => $array_resultados_img,
                "nombres" => $array_resultados_nombres
            ));
        }else{
            return view("busqueda.resultado_invitado")->with("parametros", array(
                "porcentajes"=> $array_resultados,
                "imagenes" => $array_resultados_img,
                "nombres" => $array_resultados_nombres
            ));
        }


    }


    public function obtenerMayorPorcentaje(){

    }



    // ------------------- FUNCIONES EXTRAS -----------------------------------------------------//


    //Achicar la imagen.
    private function resizeImage($type,$file,$w,$h)
    {
        $img_original	   = null;

        if ($type=='png' || $type == "PNG")
            $img_original 	   = imagecreatefrompng($file);

        if ($type=='jpg' || $type =="JPG")
            $img_original 	   = imagecreatefromjpeg($file);

        $max_ancho    	   = $w;
        $max_alto          = $h;
        list($ancho,$alto) = getimagesize($file);
        $x_ratio 		   = $max_ancho/$ancho;
        $y_ratio 		   = $max_alto/$alto;

        if(($ancho<=$max_ancho)&&($alto<=$max_alto))
        {
            $ancho_final = $ancho;
            $alto_final  = $alto;
        }
        elseif (($x_ratio * $alto) < $max_alto)
        {
            $alto_final  = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        }
        else
        {
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final  = $max_alto;
        }

        $tmp			 =	imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        imagedestroy($img_original);

        return $tmp;
    }

    //Guardar en disco el archivo.
    private function save_resizeImage($type,$fileOrigen,$fileSalida,$w,$h,$calidad)
    {
        $img = resizeImage($fileOrigen,$w,$h);
        //resizeImage($type,$tmp,$fileSalida,$calidad);
    }

    //Salida por browser.
    private function show_resizeImage($type,$file,$w,$h)
    {
        if ($type=='png')
        {
            header("Content-type: image/png");
            $img = $this->resizeImage($type,$file,$w,$h);
            imagepng($img);
        }

        if ($type=='jpg')
        {
            header("Content-type: image/jpeg");
            $img = $this->resizeImage($type,$file,$w,$h);
            imagejpeg($img);
        }
    }

    //Convertir imagen a escala de grises.
    private function convertir_BW($img)
    {
        imagefilter($img, IMG_FILTER_GRAYSCALE);
    }

    //Calcula cual es el color promedio más usado.
    private function average($img)
    {
        $w = imagesx($img);
        $h = imagesy($img);
        $r = $g = $b = 0;

        for($y = 0; $y < $h; $y++)
        {
            for($x = 0; $x < $w; $x++)
            {
                $rgb = imagecolorat($img, $x, $y);
                $r  += $rgb >> 16;
            }
        }

        $pxls = $w * $h;
        $r = (round($r / $pxls));

        //return $r ."," . $g .",". $b;
        if($r<10)
            $r=0;

        if($r>245)
            $r=255;


        return $r;
    }

    //Obtengo un array con el hash.
    private function ComputeHash($img, $avg = 100)
    {
        $w = imagesx($img);
        $h = imagesy($img);

        $matrix = array();

        $r = $g = $b = 0;

        for($y = 0; $y < $h; $y++)
        {
            $fila = "";

            for($x = 0; $x < $w; $x++)
            {
                $rgb = imagecolorat($img, $x, $y);
                $r   = $rgb >> 16;

                if($r <= $avg)
                    $fila = $fila."0";
                else
                    $fila = $fila."1";
            }
            $matrix[$y]=$fila;
        }

        return $matrix;
    }

    //Vuelco el array a un string.
    private function concatenar_array($array)
    {
        $txt ="";

        for ($i=0;$i<=count($array)-1;$i++)
        {
            $tmp = $array[$i];
            $txt = $txt.$tmp;
        }

        return $txt;
    }

    //Armo el color que se aplicara a un pixel.
    private function crear_color($img,$r,$g,$b)
    {
        return imagecolorallocate($img,$r,$g,$b);
    }

    //Transformar el hash a una imagen.
    private function hash_img_bits($img,$hashMatrix)
    {
        $w = imagesx($img);
        $h = imagesy($img);

        $deltaImg = imagecreatetruecolor($w, $h);
        imagecopy($deltaImg, $img,0,0,0,0,$w,$h);

        $negro  = imagecolorallocate( $deltaImg , 0 , 0 , 0);
        $blanco = imagecolorallocate( $deltaImg , 255 , 255 , 255);

        $x = 0;
        $y = 0;

        for($y=0; $y < $h; $y++)
        {
            for($x=0; $x < $w; $x++)
            {
                $tmp = $hashMatrix[$y];
                $bit = $tmp[$x];

                if ($bit=='1')
                    imagesetpixel($deltaImg, $x,$y,$blanco);
                else
                    imagesetpixel($deltaImg, $x,$y,$negro);
            }
        }

        return $deltaImg;
    }

    //Genera todo el proceso de hasheo de una imagen.
    private function hash_img($file,$type,$size)
    {
        $img  = $this->resizeImage($type,$file,$size,$size);
        $this->convertir_BW($img);
        $avg  = $this->average($img);
        $hash = $this->ComputeHash($img,$avg);

        return $hash;
    }

    //Calcula el porcentaje de diferencias.
    private function calc_dif_porc_hash($h1,$h2)
    {
        $fail = 0;

        for($x=0;$x <=strlen($h2)-1;$x++)
        {
            if(@$h1[$x] != @$h2[$x])
                $fail++;
        }

        $delta = ($fail*100)/strlen($h2);

        return $delta;
    }

    //Obtengo la extension del archivo.
    private function get_file_ext($file)
    {
        return pathinfo($file, PATHINFO_EXTENSION);
    }

    //Obtengo el hash de una imagen.
    public function getHash_img($img)
    {
        $ext   = $this->get_file_ext($img);
        $hash1 = $this->hash_img($img,$ext,$this->size);
        return $this->concatenar_array($hash1);
    }

    //Comparar dos imagenes.
    public function comparar_imgs($img1,$img2)
    {
        $ext1      = $this->get_file_ext($img1);
        $hash1     = $this->hash_img($img1,$ext1,$this->size);
        $hash1_str = $this->concatenar_array($hash1);

        $ext2      = $this->get_file_ext($img2);
        $hash2     = $this->hash_img($img2,$ext2,$this->size);
        $hash2_str = $this->concatenar_array($hash2);

        $dif       = $this->calc_dif_porc_hash($hash1_str,$hash2_str);
        return $dif;
    }
}
