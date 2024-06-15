<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autenticacao extends Controller
{
    public function MostrarFormLogin(){
        session_start();

        // Se user não tiver token de autenticado (geral), redireciona pra pagina de login
        if(!isset($_SESSION['user_logged_in']))
            return view('login');
        else
            return redirect()->route("dashboard");
    }
    
    public function Login(Request $request){
        // Validação dos dados repassados e chamada da função que exibe os erros na página
        try{
            $dados_user = $request->validate([
                'email' => "required|email|min:6|max:255",
                'senha' => "required|string|min:6|max:128",
            ]);
        }catch(\Illuminate\Validation\ValidationException $excep){
              return redirect()->route('login')->withErrors($excep->errors());
        }

        // Conexão padrão no banco de dados. field "" <--- necessária se no computador local o root do mysql precisar de senha.
        $sessao = mysqli_connect("localhost", "root", "", "site_jls");
        if(!$sessao){
            die("Erro tentando se conectar ao bando de dados!: ".mysqli_connect_error());
        }
        mysqli_report(MYSQLI_REPORT_OFF); // Impede do mysql reportar erros na página diretamente

        // Login (1/2) - busca pelo email repassado
        $dadosfetch = $sessao->prepare("SELECT * FROM users WHERE email = ?");
        $dadosfetch->bind_param("s", $dados_user['email']);
        $dadosfetch->execute();
        $resultado = $dadosfetch->get_result();
        
        $dadosfetch->close();
        mysqli_close($sessao);

        if($resultado->num_rows > 0){
            $user = $resultado->fetch_assoc();
            $username = explode(" ", $user['nome']);

            // Login (2/2) - associa a senha repassada pelo user com a referenciada pelo e-mail no banco de dados
            if(password_verify($dados_user['senha'], $user['senha'])){
                session_start();
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_personal'] = [
                    'nome' => $username[0],
                    'sobrenome' => isset($username[1]) ? $username[1] : '', // Se foi colocado sobrenome, coloca no token.
                ];

                if($user['classe_id'] == 3){     // Puxa do banco de dados a classe e indentifica user como administrador.
                    $_SESSION['user_is_administrator'] = true;
                    $_SESSION['user_is_staff'] = true;
                }
                else if($user['classe_id'] == 2){ // Puxa do banco de dados a classe e indentifica user como professor.
                    $_SESSION['user_is_professor'] = true;
                    $_SESSION['user_is_staff'] = true;
                }else                             // Puxa do banco de dados a classe e indentifica user como aluno.
                    $_SESSION['user_is_student'] = true;

                return redirect()->route('dashboard');
            }else{
                return view('login')->with('flag', "Senha incorreta, tente novamente!");
            }
        }else{
            return view('login')->with('flag', "Endereço e-mail não encontrado, certifique-se de que o campo foi preenchido corretamente!");
        }
    }

    public function Logout(){
        session_start();

        if(isset($_SESSION["user_logged_in"])){
            session_unset();

            return redirect()->route('home');
        }
    }
}
