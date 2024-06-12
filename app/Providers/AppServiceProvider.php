<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* User autenticado blade diretivas */
        Blade::directive('autcd', function(){
            return '<?php if(!isset($_SESSION))session_start();
                     if(isset($_SESSION["user_logged_in"])): ?>';
        });

        Blade::directive('endautcd', function(){
            return "<?php endif ?>";
        });


        /* User não autenticado blade diretivas */
        Blade::directive('conv', function(){
            return '<?php if(!isset($_SESSION))session_start(); 
                     if(!isset($_SESSION["user_logged_in"])): ?>';
        });
 
        Blade::directive('endconv', function(){
            return "<?php endif ?>";
        });


        /* User autenticado como administrador blade diretivas */
        Blade::directive('admin', function(){
            return '<?php if(!isset($_SESSION))session_start();
                    if(isset($_SESSION["user_is_administrator"])): ?>';
        });

        Blade::directive('endadmin', function(){
            return "<?php endif ?>";
        });


        /* User autenticado como funcionario blade diretivas */
        Blade::directive('professor', function(){
            return '<?php if(!isset($_SESSION))session_start();
                    if(isset($_SESSION["user_is_professor"])): ?>';
        });

        Blade::directive('endprofessor', function(){
            return '<?php endif ?>';
        });


        /* User funcionário (compartilhamento entre staffs) blade diretivas */
        Blade::directive('staff', function(){
            return '<?php if(!isset($_SESSION))session_start();
                if(isset($_SESSION["user_is_staff"])): ?>';
        });

        Blade::directive('endstaff', function(){
            return "<?php endif ?>";
        });


        /* User autenticado como aluno blade diretivas */
        Blade::directive('aluno', function(){ 
            return '<?php if(!isset($_SESSION))session_start(); 
                     if(isset($_SESSION["user_is_student"])): ?>';
        });
        
        Blade::directive('endaluno', function(){
            return "<?php endif ?>";
        });
    }
}
