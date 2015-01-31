<?php
require_once("Grupo.php");
class GrupoDB {
	static function salvar($id, $nome, $conexao){
		$sql = "insert into grupo values('" . $id ."','" . $nome . "')";
		$insertRow = $conexao->query($sql);

		if($insertRow){
			header("Location: list.php?message=Grupo Criado com sucesso");
			
		}else {
			header("Location: create.php?message=Falha ao criar Novo Grupo: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function listar($conexao){
		$sql = "select * from grupo";
		$obj  = $conexao->query($sql);
		$grupoList = [];
		$i = 0;

		while ($grupo = $obj->fetch_object()) {
			$grupoToadd = new Grupo($grupo->idgrupo, $grupo->nome);
			$grupoList[$i] = $grupoToadd;
			$i++;
		}
		return $grupoList;
	}

	static function filtrar($id, $nome, $conexao){
		$sql = "select * from grupo where idgrupo like '%" .$id . "%' and nome like '%" . $nome ."%'";
		$obj  = $conexao->query($sql);
		$grupoList = [];
		$i = 0;

		while ($grupo = $obj->fetch_object()) {
			$grupoToadd = new Grupo($grupo->idgrupo, $grupo->nome);
			$grupoList[$i] = $grupoToadd;
			$i++;
		}
		return $grupoList;
	}

	static function findById($id, $conexao){
		$sql = "select * from grupo where idgrupo = ". $id;
		$obj = $conexao->query($sql);
		$grupoEager =  $obj->fetch_object();
		if($grupoEager){
			$grupoToReturn = new Grupo($grupoEager->idgrupo, $grupoEager->nome);
			return $grupoToReturn;
		}else {
			header("Location: list.php?message=Grupo não encontrado");
		}
	}

	static function delete($id, $conexao){
		$sql = "delete from grupo where idgrupo = " . $id;
		$rowsAffected = $conexao->query($sql);
		if($rowsAffected){
			header("Location: list.php?message=Grupo Deletado com sucesso");
		}else {
			header("Location: list.php?message=Falha ao deletar Grupo: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function update($oldId, $id, $nome, $conexao){
		$sql = "update grupo set idGrupo = ".$id.", nome = '" . $nome ."' where idGrupo = " . $oldId;
		$insertRow = $conexao->query($sql);

		if($insertRow){
			header("Location: list.php?message=Grupo alterado com sucesso");
		}else {
			header("Location: edit.php?id=" . $oldId . "&message=Falha ao alterar Grupo: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function findNameById($id, $conexao){
		$sql = "select nome from grupo where idgrupo = ". $id;
		$obj = $conexao->query($sql);
		$grupoEager =  $obj->fetch_object();
		if($grupoEager){
			$nome = $grupoEager->nome;
			return $nome;
		}else {
			header("Location: list.php?message=Grupo não encontrado");
		}
	}
}
?>