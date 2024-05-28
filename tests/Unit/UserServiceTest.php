<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mission;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use App\Models\Historique_Statut;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $userService;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $this->userService = new UserService();
    }

    public function testGetUserById()
    {
        // Créer un utilisateur fictif pour le test
        $user = User::factory()->create();

        // Appeler la méthode getUserById avec l'ID de l'utilisateur créé
        $userId = $user->Id_Utilisateur;
        $recupererUser = $this->userService->getUserById($userId);

        // Vérifier que l'utilisateur retourné correspond à l'utilisateur créé
        $this->assertEquals($user->toArray(), $recupererUser->toArray());
    }

    public function testGetAllUsersByFunction()
    {
        User::factory()->count(3)->create(['Id_Fonction' => 2]);
        User::factory()->count(2)->create(['Id_Fonction' => 1]);

        $users = $this->userService->getAllUsersByFunction(2);

        $this->assertCount(3, $users);
    }

    public function testGetMissionCountByUser()
    {
        $user = User::factory()->create();
        Mission::factory()->count(5)->create(['Id_Utilisateur' => $user->Id_Utilisateur]);

        //Création d'un statut != en attente de déclaration pour chaque mission
        foreach (Mission::all() as $mission) {
            Historique_Statut::create([
                'Id_Mission' => $mission->Id_Mission,
                'Id_Statut' => 2,
                'Date_Changement' => Carbon::now(),
            ]);
        }

        $missionCount = $this->userService->getMissionCountByUser($user->Id_Utilisateur);
        $this->assertEquals(5, $missionCount);
    }

    public function testGetUsersWithMissionCount()
    {
        $user = User::factory()->create(['Id_Fonction' => 2]);
        Mission::factory()->count(3)->create(['Id_Utilisateur' => $user->Id_Utilisateur]);
        foreach (Mission::all() as $mission) {
            Historique_Statut::create([
                'Id_Mission' => $mission->Id_Mission,
                'Id_Statut' => 2,
                'Date_Changement' => Carbon::now(),
            ]);
        }
        $usersWithMissionCount = $this->userService->getUsersWithMissionCount(2);

        $this->assertCount(1, $usersWithMissionCount);
        $this->assertEquals(3, $usersWithMissionCount[0][1]);
    }
}
