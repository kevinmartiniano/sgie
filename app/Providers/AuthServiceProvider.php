<?php

namespace App\Providers;

use App\Aluno;
use App\Curso;
use App\Policies\AlunoPolicy;
use App\Policies\CursoPolicy;
use App\Policies\InstituicaoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        InstituicaoPolicy::class => InstituicaoPolicy::class,
        Curso::class => CursoPolicy::class,
        Aluno::class => AlunoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
