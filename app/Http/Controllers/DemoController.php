<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\solicitude;
use Illuminate\Support\Facades\Http as FacadesHttp;

class DemoController extends Controller
{
    //
    public function saludar(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');

        $resultado = "Hola como estas $nombre $apellido";
        return json_encode(
            array(
                'status' => 200,
                'response' => array(
                    'mensaje' => $resultado
                )
            )

        );
    }

    public function buscarAlumno(Request $request)
    {

        $matricula = $request->input('matricula');

        $url = 'http://siu.utcancun.edu.mx/api/AlumnosApi/GetAlumnosByMatricula?matricula=';
        $urlmat = $url . $matricula;
        $urlgenerada =  FacadesHttp::get($urlmat);
        $false = $urlgenerada->json('matricula');
        if (is_null($false)) {
            return response()->json(['status'=>'400',
                'wsp_mensaje' => 'Alumno no encontrado, matricula incorrecta']);
        }
        $nombrecompleto = $urlgenerada->json(
            'nombreCompleto'
        );
        $carrera = $urlgenerada->json(
            'carrera'
        );
        $grupo = $urlgenerada->json(
            'grupo'
        );
        $cuatrimestre = $urlgenerada->json(
            'cuatrimestre'
        );

        return response()->json([
            array(
                'status' => 200,
                'ews_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJsImp0aSI6...',
                'wsp_no_solicitud' => '1234',
                'ews_llave' => '2Y3f3f4JWESrV0l1sCciFigrltvOoQlhBoM2vpuxSZKjPqhsoqmonKZwPiiWZyIUmiYv2JbcwTiitoSyW20DiX0fPyElDdnbg483',
                'ews_id_tramite' => "155155",
                'ews_fecha_solicitud' => "2020-02-23",
                'ews_hora_solicitud' => "14:00:00",

                'wsp_mensaje' => 'Alumno encontrado',
                'wsp_no_solicitud' => '1234',
                'wsp_no_solicitud_api' => '1',
                'wsp_nivel' => '1',

                'wsp_datos' => array(
                    '0 ' => array(
                        '0 ' => $nombrecompleto,
                        '1 ' => $carrera,
                        '2 ' => $grupo,
                        '3 ' => $cuatrimestre,
                        '4 ' => 'sin pago'
                    )

                )
            )
        ]);

    }
    public function pagoUnico(){
        
    }
}
