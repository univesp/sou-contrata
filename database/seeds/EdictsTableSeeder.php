<?php

use Illuminate\Database\Seeder;
use App\Edict;

class EdictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * NÃO ALTERAR ESSE CODIGO
         */
        $edicts = factory(\App\Edict::class, 100)->create();

        $edicts->each(function ($edict){
             $vacancies = factory(\App\Vacancy::class, 10)->create([
                 'edict_id' =>$edict->id
             ]);

            $vacancies->each(function ($vacancy){

                $criteria = factory(\App\Criterion::class, 10)->create();
                $services = factory(\App\Service::class, 10)->create();

                $criteria->each(function ($criterion) use ($vacancy){
                    factory(\App\VacancyCriterion::class, 1)->create([
                        'criterion_id' => $criterion->id,
                        'vacancy_id' => $vacancy->id
                    ]);
                });

                $services->each(function ($service)use ($vacancy){
                    factory(\App\AssignmentVacancy::class, 1)->create([
                        'service_id' => $service->id,
                        'vacancy_id' => $vacancy->id
                    ]);
                });

            });
         });
    }
}
