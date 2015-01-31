<?php
require_once("Faixa.php");
class FaixaDB {
	static function listar($conexao){
		$sql = "select * from faixa";
		$obj  = $conexao->query($sql);
		$grupoList = [];
		$i = 0;

		while ($faixa = $obj->fetch_object()) {
			$faixaToadd = new Faixa($faixa->idfaixa, $faixa->idalbum, $faixa->duracao,$faixa->nome);
			$faixaList[$i] = $faixaToadd;
			$i++;
		}
		return $faixaList;
	}

	static function salvar($id, $nome, $duracao, $idGrupo, $conexao){
		$sql = "insert into faixa values('" . $id ."',".$duracao .", " .$idGrupo. ",'" . $nome . "')";
		$insertRow = $conexao->query($sql);

		if($insertRow){
			header("Location: list.php?message=Album Criado com sucesso");
			
		}else {
			header("Location: create.php?message=Falha ao criar Nova Faixa: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function findById($id, $conexao){
		$sql = "select * from faixa where idfaixa = ". $id;
		$obj = $conexao->query($sql);
		$faixa =  $obj->fetch_object();
		if($faixa){
			$faixaToReturn = new Faixa($faixa->idfaixa, $faixa->idalbum, $faixa->duracao,$faixa->nome);
			return $faixaToReturn;
		}else {
			header("Location: list.php?message=Faixa não encontrado");
		}
	}

	static function update($oldId, $id, $nome, $duracao, $idAlbum, $conexao){
		$sql = "update faixa set idFaixa = ".$id.", nome = '" . $nome ."', duracao = ". $duracao .", idAlbum = ".$idAlbum." where idAlbum = " . $oldId;
		$insertRow = $conexao->query($sql);

		if($insertRow){
			header("Location: list.php?message=Album alterado com sucesso");
		}else {
			header("Location: edit.php?id=" . $oldId . "&message=Falha ao alterar Album: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function delete($id, $conexao){
		$sql = "delete from faixa where idfaixa = " . $id;
		$rowsAffected = $conexao->query($sql);
		if($rowsAffected){
			header("Location: list.php?message=Faixa Deletada com sucesso");
		}else {
			header("Location: list.php?message=Falha ao deletar Faixa: " . $conexao->errno .") ". $conexao->error);
		}
	}

}
?>