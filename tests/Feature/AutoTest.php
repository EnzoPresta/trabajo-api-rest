<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Auto;

class AutoTest extends TestCase
{

    public function test_ListarUnoQueExiste()
    {
        $estructura = [
            "id","marca","modelo","color","puertas","cilindrado","automatico","electrico","created_at","updated_at","deleted_at"
        ];
        $response = $this->get('/api/autos/10000');

        $response->assertStatus(200);
        $response->assertJsonCount(11);
        $response->assertJsonStructure($estructura);
    }

    public function test_ListarUnoQueNoExiste(){
        $response = $this->get('/api/autos/9999999');
        $response->assertStatus(404);
    }

    public function test_EliminarUnoQueExiste(){
        $response = $this->delete('/api/autos/10001');
        $response->assertStatus(200);
        $response->assertJsonFragment([
             "mensaje" => "Auto 10001 eliminado"
        ]);
        $this->assertDatabaseMissing('autos', [
            'id' => '10001',
            'deleted_at' => null
        ]);
        Auto::withTrashed()->where("id",10001)->restore();
    }

    public function test_EliminarUnoQueNoExiste(){
        $response = $this->delete('/api/autos/9999999');
        $response->assertStatus(404);
    }

    public function test_ModificarUnoQueNoExiste(){
        $response = $this->put('/api/autos/9999999');
        $response->assertStatus(404);
    }

    public function test_ModificarUnoQueExiste(){
        $estructura = [
            "id",
            "marca",
            "modelo",
            "color",
            "puertas",
            "cilindrado",
            "automatico",
            "electrico",
            "created_at",
            "updated_at",
            "deleted_at"
        ];
        $response = $this->put('/api/autos/10002',[
            "marca" => "Ferrari",
            "modelo" => "Enzo",
            "color" => "Rojo",
            "puertas" => "2",
            "cilindrado" => "5998 cc",
            "automatico" => "No",
            "electrico" => "No"
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "marca" => "Ferrari",
            "modelo" => "Enzo",
            "color" => "Rojo",
            "puertas" => "2",
            "cilindrado" => "5998 cc",
            "automatico" => "No",
            "electrico" => "No"
        ]);

    }
    public function test_Insertar()
    {
        $response = $this->post('/api/autos/',[ 
            "marca" => "Lamborghini", 
            "modelo" => "Sesto Elemento", 
            "color" => "Negro", 
            "puertas" => "2", 
            "cilindrado" => "5200 cc", 
            "automatico" => "No", 
            "electrico" => "No"
        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(10);

        $this->assertDatabaseHas('autos', [
            'marca' => 'Lamborghini', 
            'modelo' => 'Sesto Elemento', 
            'color' => 'Negro', 
            'puertas' => '2', 
            'cilindrado' => '5200 cc', 
            'automatico' => 'No', 
            'electrico' => 'No'
        ]);

    }
}
