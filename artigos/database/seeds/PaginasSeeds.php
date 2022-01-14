<?php

use Illuminate\Database\Seeder;
use App\Paginas;
class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Paginas::where('tipo','=','sobre')->count();
        if($existe){
            $paginasobre = Paginas::where('tipo','=','sobre')->first();
        }else{
            $paginasobre = new Paginas();
            
        }
        
        $paginasobre->titulo = "A empresa";
        $paginasobre->descricao = "A empresa trabalha com o objetivo tal";
        $paginasobre->texto = "A Historia da empresa";
        $paginasobre->imagem = "img/modelo_img_home.jpg";
        $paginasobre->tipo = "sobre";
        $paginasobre->mapa = "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.1128468631605!2d-37.76842818523809!3d-4.57374359667711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b9b3ad8dc5852b%3A0x1a5cb853a4184899!2sEscola+Profissionalizante+Professora+Elsa+Maria+Porto+Costa+Lima!5e0!3m2!1spt-BR!2sbr!4v1524611091672' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>";
        $paginasobre->save();
        
        $existe = Paginas::where('tipo','=','contato')->count();
        if($existe){
            $paginacontato = Paginas::where('tipo','=','contato')->first();
        }else{
            $paginacontato = new Paginas();
            
        }
        
        $paginacontato->titulo = "Contato";
        $paginacontato->descricao = "Preencha o formulário";
        $paginacontato->texto = "Fale Conosco";
        $paginacontato->imagem = "img/modelo_img_home.jpg";
        $paginacontato->tipo = "contato";
        $paginacontato->email = "contato@dominio.com.br";
        $paginacontato->save();
    }
}
