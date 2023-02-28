<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LikedProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $projectsArray = array(
        array(
            'titulo' => 'Telephone.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra dui purus, id maximus augue pellentesque sit amet. Integer non nisi nulla. Fusce turpis risus, molestie non sagittis vitae, ullamcorper a arcu. Ut tortor dolor, dignissim ac dignissim vitae, consectetur at leo.',
            'fecha' => '2022-11-12',
            'imagen' => 'telephone.jpg'
        ),
        array(
            'titulo' => 'Cats.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra dui purus, id maximus augue pellentesque sit amet. Integer non nisi nulla. Fusce turpis risus, molestie non sagittis vitae, ullamcorper a arcu. Ut tortor dolor, dignissim ac dignissim vitae, consectetur at leo.',
            'fecha' => '2022-09-12',
            'imagen' => 'cat.jpg'
        ),
        array(
            'titulo' => 'Desert.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra dui purus, id maximus augue pellentesque sit amet. Integer non nisi nulla. Fusce turpis risus, molestie non sagittis vitae, ullamcorper a arcu. Ut tortor dolor, dignissim ac dignissim vitae, consectetur at leo.',
            'fecha' => '2022-12-12',
            'imagen' => 'desert2.jpg'
        ),
        array(
            'titulo' => 'Portrait.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra dui purus, id maximus augue pellentesque sit amet. Integer non nisi nulla. Fusce turpis risus, molestie non sagittis vitae, ullamcorper a arcu. Ut tortor dolor, dignissim ac dignissim vitae, consectetur at leo.',
            'fecha' => '2022-10-12',
            'imagen' => 'portrait.jpg'
        ),
        array(
            'titulo' => '922928.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra dui purus, id maximus augue pellentesque sit amet. Integer non nisi nulla. Fusce turpis risus, molestie non sagittis vitae, ullamcorper a arcu. Ut tortor dolor, dignissim ac dignissim vitae, consectetur at leo.',
            'fecha' => '2022-08-12',
            'imagen' => 'pier.jpg'
        )
    );

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Miguel',
            'lastname' => 'López',
            'dni' => '12345678Q',
            'email' => 'mlopcob12@iesmarquesdecomares.org',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'dni' => '11111111Q',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'rol' => 'admin'
        ]);

        User::factory(10)->create();

        DB::table('projects')->delete();
        foreach($this->projectsArray as $project) {
            $p = new Project();
            $p->titulo = $project['titulo'];
            $p->description = $project['description'];
            $p->fecha = $project['fecha'];
            $p->imagen = $project['imagen'];
            $p->user_id = 1;
            $p->save();
        }

        LikedProject::factory()->count(50)->create();
    }
}
