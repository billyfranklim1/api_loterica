<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/quina/{chave?}/{concurso?}', function ($chave = '',$concurso = '') {

    if(empty($chave)){
        return ['status'=>0,'msg'=>'Chave Invalida'];
    }

    if(empty($concurso)){
        return ['status'=>0,'msg'=>'Falta o Concurso'];
    }
    $time = time();
    $url = "http://loterias.caixa.gov.br/wps/portal/loterias/landing/quina/!ut/p/a1/jc69DoIwAATgZ_EJepS2wFgoaUswsojYxXQyTfgbjM9vNS4Oordd8l1yxJGBuNnfw9XfwjL78dmduIikhYFGA0tzSFZ3tG_6FCmP4BxBpaVhWQuA5RRWlUZlxR6w4r89vkTi1_5E3CfRXcUhD6osEAHA32Dr4gtsfFin44Bgdw9WWSwj/dl5/d5/L2dBISEvZ0FBIS9nQSEh/pw/Z7_61L0H0G0J0VSC0AC4GLFAD20G6/res/id=buscaResultado/c=cacheLevelPage/=/?";
    $url .= "timestampAjax=$time&concurso=$concurso";
    $response = Http::get($url);
    return ['dt_sorteio'=>$response['dataStr'],'concurso'=>$concurso,'resultado'=>$response['resultadoOrdenado']];
});


Route::get('/sena/{chave?}/{concurso?}', function ($chave = '',$concurso = '') {

    if(empty($chave)){
        return ['status'=>0,'msg'=>'Chave Invalida'];
    }

    if(empty($concurso)){
        return ['status'=>0,'msg'=>'Falta o Concurso'];
    }

    $time = time();
    $url = "http://loterias.caixa.gov.br/wps/portal/loterias/landing/megasena/!ut/p/a1/04_Sj9CPykssy0xPLMnMz0vMAfGjzOLNDH0MPAzcDbwMPI0sDBxNXAOMwrzCjA0sjIEKIoEKnN0dPUzMfQwMDEwsjAw8XZw8XMwtfQ0MPM2I02-AAzgaENIfrh-FqsQ9wNnUwNHfxcnSwBgIDUyhCvA5EawAjxsKckMjDDI9FQE-F4ca/dl5/d5/L2dBISEvZ0FBIS9nQSEh/pw/Z7_HGK818G0KO6H80AU71KG7J0072/res/id=buscaResultado/c=cacheLevelPage/=/?";
    $url .= "timestampAjax=$time&concurso=$concurso";
    $response = Http::get($url);
    return ['dt_sorteio'=>$response['dataStr'],'concurso'=>$concurso,'resultado'=>$response['resultadoOrdenado']];

});
