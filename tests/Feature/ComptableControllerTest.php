<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Mission;
use App\Models\Historique_Statut;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ComptableControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
    }

    public function testShowListeVisiteur()
    {
        $comptable = User::factory()->create(['Id_Fonction' => 1]);
        $comptable->assignRole('comptable'); //Utilisation des permissions Spatie pour attribuer le role comptable de la table roles (précédement seeder)
        $this->actingAs($comptable);


        Mission::factory()->count(3)->create();

        $response = $this->get(route('Comptable.show_ListeVisiteur'));

        $response->assertStatus(200);
        $response->assertViewIs('Comptabilite.utilisateur');
        $response->assertViewHas('tab_infos_users');
    }

    public function testShowListeMissionParVisiteur() //mission(s) du visiteur vue par le comptable
    {
        $comptable = User::factory()->create(['Id_Fonction' => 1]);
        $comptable->assignRole('comptable'); //Utilisation des permissions Spatie pour attribuer le role comptable de la table roles (précédement seeder)
        $this->actingAs($comptable);

        //création d'un utilisateur et des fonctions qu'il lui appartienne
        $utilisateur = User::factory()->create();
        Mission::factory()->count(5)->create(['Id_Utilisateur' => $utilisateur->Id_Utilisateur]);

        //Attribution d'un statut à chacune des missions 
        foreach (Mission::all() as $mission) {
            Historique_Statut::create([
                'Id_Mission' => $mission->Id_Mission,
                'Id_Statut' => 3,
                'Date_Changement' => Carbon::now(),
            ]);
        }

        $response = $this->get(route('Comptable.show_ListeMission_ParVisiteur', ['id' => $utilisateur->Id_Utilisateur]));

        $response->assertStatus(200);
        $response->assertViewIs('GestionFrais.show_liste_mission');
        $response->assertViewHas(['missions', 'userInfo']);
    }

    public function testValiderMission()
    {
        $comptable = User::factory()->create(['Id_Fonction' => 1]);
        $comptable->assignRole('comptable'); //Utilisation des permissions Spatie pour attribuer le role comptable de la table roles (précédement seeder)
        $this->actingAs($comptable);

        $mission = Mission::factory()->create();
        //Statut de la mission
        Historique_Statut::create([
            'Id_Mission' => $mission->Id_Mission,
            'Id_Statut' => 3,
            'Date_Changement' => Carbon::now(),
        ]);

        $response = $this->post(route('Comptable.valider_mission', ['id' => $mission->Id_Mission]));

        $response->assertRedirect();
        $this->assertDatabaseHas('historique_statut', [
            'Id_Mission' => $mission->Id_Mission,
            'Id_Statut' => 2,
        ]);
    }

    public function testRefuserMission()
    {
        $comptable = User::factory()->create(['Id_Fonction' => 1]);
        $comptable->assignRole('comptable'); //Utilisation des permissions Spatie pour attribuer le role comptable de la table roles (précédement seeder)
        $this->actingAs($comptable);

        $mission = Mission::factory()->create();
        Historique_Statut::create([
            'Id_Mission' => $mission->Id_Mission,
            'Id_Statut' => 3,
            'Date_Changement' => Carbon::now(),
        ]);

        $response = $this->post(route('Comptable.refuser_mission', ['id' => $mission->Id_Mission]));

        $response->assertRedirect();
        $this->assertDatabaseHas('historique_statut', [
            'Id_Mission' => $mission->Id_Mission,
            'Id_Statut' => 4,
        ]);
    }
}
