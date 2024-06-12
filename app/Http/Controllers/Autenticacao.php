<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autenticacao extends Controller
{
    public function MostrarFormReg(){ // Colocar como controller individual pra admin/staff (?)
        session_start();

        // Se user tiver token administrador ou for funcionario, retorna página de registro.
        if(isset($_SESSION['user_is_administrator']) || isset($_SESSION['user_is_professor'])){
            return view('authentication.registro');
        }else{
            header("HTTP/1.1 401 Unauthorized", true, 401);
            return view('unauthorized');
        }
    }

    public function MostrarFormLogin(){
        session_start();

        // Se user não tiver token de autenticado (geral), redireciona pra pagina de login
        if(!isset($_SESSION['user_logged_in']))
            return view('authentication.login');
        else
            return redirect()->route("dashboard");
    }
    
    public function Registro(Request $request){
        // Validação dos dados repassados e chamada da função que exibe os erros na página
        try{
            $dados_user = $request->validate([
                'nome' => "required|string|min:6|max:255",
                'email' => "required|email|max:255",
                'senha' => "required|string|min:6|max:128",
            ]);
        }catch (\Illuminate\Validation\ValidationException $excep){
            return redirect('registro')->withErrors($excep->errors());
        }
        $userclass = $request['classe'];

        // Conexão padrão no banco de dados. field "" <--- necessária se no computador local o root do mysql precisar de senha.
        $sessao = mysqli_connect("localhost", "root", "", "site_jls");
        if(!$sessao){
            die("Erro tentando se conectar ao bando de dados!: ".mysqli_connect_error());
        }
        mysqli_report(MYSQLI_REPORT_OFF); // Impede do mysql reportar erros na página diretamente

        // Realiza uma busca pelo email repassado (único) no banco de dados.
        $req = $sessao->prepare("SELECT * FROM users WHERE email = ?");
        $req->bind_param("s", $dados_user['email']);
        $req->execute();
        $resultado = $req->get_result();

        // Se resultado trazer uma linha ou mais, indica que algo foi encontrado.
        if($resultado->num_rows > 0){
            return view('authentication.registro')->with('flag', "Endereço e-mail já anteriormente utilizado. Tente novamente com um novo!");
        }

        $senha_hash = password_hash($dados_user['senha'], PASSWORD_DEFAULT);
        
        // Insere os dados repassados e tratados pra dentro do banco de dados.
        $req = $sessao->prepare("INSERT INTO users (nome, email, senha, classe_id)  VALUES (?, ?, ?, ?)");
        $req->bind_param("sssi", $dados_user['nome'], $dados_user['email'], $senha_hash, $userclass);
        $resultado = $req->execute();

        // Retorno da execução do comando mysql.
        if($resultado){
            return view('authentication.registro')->with('flag', "Usuário criado com sucesso!");
        }else{
            return view('authentication.registro')->with('flag', "Erro inesperado, tente novamente!");
        }

        $request->close();
        mysqli_close($sessao);
    }


    public function Login(Request $request){
        // Validação dos dados repassados e chamada da função que exibe os erros na página
        try{
            $dados_user = $request->validate([
                'email' => "required|email|min:6|max:255",
                 'senha' => "required|string|min:6|max:128",
            ]);
        }catch(\Illuminate\Validation\ValidationException $excep){
              return redirect('login')->withErrors($excep->errors());
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
                return view('authentication.login')->with('flag', "Senha incorreta, tente novamente!");
            }
        }else{
            return view('authentication.login')->with('flag', "Endereço e-mail não encontrado, certifique-se de que o campo foi preenchido corretamente!");
        }

        $datafetch->close();
        mysqli_close($sessao);
    }

    public function Logout(){
        session_start();

        if(isset($_SESSION["user_logged_in"])){
            session_unset();

            return redirect()->route('home');
        }
    }
}
