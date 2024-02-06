<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 20; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(4);
            $project->description = $faker->paragraph();
            $project->slug = Str::of($project->title)->slug('-');
            $project->tecnologies_stack = $faker->words(3, true);
            $project->save();
        }
    }
}
