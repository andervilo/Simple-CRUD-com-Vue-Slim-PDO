<?php
require 'Connection.php';
class Professor{
    
    public static function getAllProfessor() {
        $pdo = new Connection();
        $query = 'SELECT * FROM professor';
        $getProf = $pdo->getConnection()->prepare($query);
        $getProf->execute();
        $results = $getProf->fetchAll(PDO::FETCH_ASSOC);
        return $results;        
    }
    
    public static function getProfessorById($id) {
        $pdo = new Connection();
        $query = 'SELECT * FROM professor WHERE id = :id';
        $getProf = $pdo->getConnection()->prepare($query);
        $getProf->bindParam(':id', $id);
        $getProf->execute();
        $results = $getProf->fetch(PDO::FETCH_ASSOC);
        return $results;        
    }
    
    public static function deleteProfessor($id) {
        $pdo = new Connection();
        $query = 'DELETE FROM professor WHERE id = :id';
        $getProf = $pdo->getConnection()->prepare($query);
        $getProf->bindParam(':id', $id);
        $getProf->execute();
        return 'Registro com ID = '.$id.' excluido com sucesso!'; 
    }
    
    public static function salvarProfessor($dados = []) {        
        $pdo = new Connection();
        $query = 'INSERT INTO professor (nome, telefone, endereco) VALUES(:nome, :telefone, :endereco) ';
        $getProf = $pdo->getConnection()->prepare($query);
        $getProf->bindParam(':nome', $dados['nome']);
        $getProf->bindParam(':telefone', $dados['telefone']);
        $getProf->bindParam(':endereco', $dados['endereco']);
        $getProf->execute();
        
        return 'Registro adicionado com sucesso!'; 
    }
    
    public static function atualizarProfessor($dados = []) {        
        $pdo = new Connection();
        $query = 'UPDATE professor SET nome = :nome, telefone = :telefone, endereco = :endereco WHERE id = :id ';
        $getProf = $pdo->getConnection()->prepare($query);
        $getProf->bindParam(':id', $dados['id']);
        $getProf->bindParam(':nome', $dados['nome']);
        $getProf->bindParam(':telefone', $dados['telefone']);
        $getProf->bindParam(':endereco', $dados['endereco']);
        $getProf->execute();
        
        return 'Registro atualizado com sucesso!'; 
    }
   

    
}
