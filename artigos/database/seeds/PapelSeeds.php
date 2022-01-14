<?php

use Illuminate\Database\Seeder;

use App\Papel;
class PapelSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Papel::where('nome','=','admin')->count()){
            $admin = Papel::create([
                'nome' => 'admin',
                'descricao' => 'administrador do sistema'
            ]);
        }
        if(!Papel::where('nome','=','gerente')->count()){
            $admin = Papel::create([
                'nome' => 'gerente',
                'descricao' => 'gerente do sistema'
            ]);
        }
        if(!Papel::where('nome','=','vendedor')->count()){
            $admin = Papel::create([
                'nome' => 'vendedor',
                'descricao' => 'vendedor do sistema'
            ]);
        }
    }
}
