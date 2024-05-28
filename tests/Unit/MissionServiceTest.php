<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\MissionService;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class MissionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $missionService;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
        $this->missionService = new MissionService();
    }

    public function testGetMissionsByUser()
    {
        $user = User::factory()->create();
        Mission::factory()->count(4)->create(['Id_Utilisateur' => $user->Id_Utilisateur]);
        // echo User::all();
        // echo Mission::all();

        $missions = $this->missionService->getMissionsByUser($user->Id_Utilisateur);

        $this->assertCount(4, $missions);
    }
}
