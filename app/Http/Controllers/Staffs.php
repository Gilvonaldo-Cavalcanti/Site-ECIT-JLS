<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Staffs extends Controller
{
    public function Registro(Request $request){
        // Validação dos dados repassados e chamada da função que exibe os erros na página
        try{
            $dados_user = $request->validate([
                'nome' => "required|string|min:6|max:255",
                'email' => "required|email|max:255",
                'senha' => "required|string|min:6|max:128",
            ]);
        }catch (\Illuminate\Validation\ValidationException $excep){
            return redirect()->route('dashboard', ['#staffs-panel'])->withErrors($excep->errors());
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
            return view('dashboard')->with('flag-criar-usr', "Endereço e-mail já anteriormente utilizado. Tente novamente com um novo!");
        }

        $senha_hash = password_hash($dados_user['senha'], PASSWORD_DEFAULT);
        
        // Insere os dados repassados e tratados pra dentro do banco de dados.
        $req = $sessao->prepare("INSERT INTO users (nome, email, senha, classe_id)  VALUES (?, ?, ?, ?)");
        $req->bind_param("sssi", $dados_user['nome'], $dados_user['email'], $senha_hash, $userclass);
        $resultado = $req->execute();

        $req->close();
        mysqli_close($sessao);

        // Retorno da execução do comando mysql.
        if($resultado){
            return redirect(route('dashboard') . '#staffs-panel')->with('flag-criar-usr', 'Usuário criado com sucesso!');
        }else{
            return redirect()->route('dashboard', '#staffs-panel')->with('flag-criar-usr', "Erro inesperado, tente novamente!");
        }
    }

    public function DeletarUser(Request $request){
         $nomeref = $request['deletar-nome'];
         if(!$nomeref)
             return redirect()->route('dashboard', '#staffs-panel')->with('flag-del-usr', 'Certifique-se de digitar no campo abaixo!');

         $sessao = mysqli_connect("localhost", "root", "", "site_jls");
         if(!$sessao){
             die("Erro tentando se conectar ao bando de dados!: ".mysqli_connect_error());
         }
         mysqli_report(MYSQLI_REPORT_OFF); // Impede do mysql reportar erros na página diretamente

         $req = $sessao->prepare("SELECT * FROM users WHERE nome = ?");
         $req->bind_param("s", $nomeref);
         $req->execute();
         $resultado = $req->get_result();

         if($resultado->num_rows > 0){
            $req = $sessao->prepare('DELETE FROM users WHERE nome = ?'); //  Adicionar questao de perms de deletar classe independente de user.
            $req->bind_param('s', $nomeref);
            $resultado = $req->execute();

            if($resultado){
                return redirect()->route('dashboard', '#staffs-panel')->with('flag-del-usr', 'Usuário deletado com sucesso!');
            }else{
                return redirect()->route('dashboard', '#staffs-panel')->with('flag-del-usr', 'Erro inesperado. Tente novamente!');
            }
         }else{
             return redirect()->route('dashboard', '#staffs-panel')->with('flag-del-usr', 'Usuário não encontrado no banco de dados!');
         }
    }
}
