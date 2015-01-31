<?php
require_once("Album.php");
class AlbumDB {

	static function salvar($id, $nome, $ano, $quantidadeEstoque, $valor, $idGrupo, $conexao){
		$sql = "insert into album values('" . $id ."','" . $idGrupo ."','"  .$nome . "','". $ano . "'," . $quantidadeEstoque . ",". $valor .")";
		$insertRow = $conexao->query($sql);

		if($insertRow){
			header("Location: list.php?message=Album Criado com sucesso");
			
		}else {
			header("Location: create.php?message=Falha ao criar Novo Album: " . $conexao->errno .") ". $conexao->error);
		}
	}


	static function listar($conexao){
		$sql = "select * from album";
		$obj  = $conexao->query($sql);
		$albumList = [];
		$i = 0;

		while ($album = $obj->fetch_object()) {
			$albumToadd = new Album($album->idalbum, $album->ano, $album->quantidade_estoque, $album->valor, $album->idgrupo, $album->nome);
			$albumList[$i] = $albumToadd;
			$i++;
		}
		return $albumList;
	}

	static function delete($id, $conexao){
		$sql = "delete from album where idalbum = " . $id;
		$rowsAffected = $conexao->query($sql);
		if($rowsAffected){
			header("Location: list.php?message=Album Deletado com sucesso");
		}else {
			header("Location: list.php?message=Falha ao deletar Album: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function findById($id, $conexao){
		$sql = "select * from album where idalbum = ". $id;
		$obj = $conexao->query($sql);
		$albumEager =  $obj->fetch_object();
		if($albumEager){
			$albumToReturn = new ALbum($albumEager->idalbum, $albumEager->ano, $albumEager->quantidade_estoque, $albumEager->valor, $albumEager->idgrupo, $albumEager->ano);
			return $albumToReturn;
		}else {
			header("Location: list.php?message=Album não encontrado");
		}
	}

	static function update($oldId , $id, $nome, $ano, $quantidadeEstoque, $valor, $idGrupo, $conexao){
		$sql = "update album set idAlbum = ".$id.", ano = '" . $ano ."', nome = '" . $nome ."', quantidade_estoque = " . $quantidadeEstoque .",
		valor = '" .$valor . "', idgrupo = '" . $idGrupo ."' where idalbum = " . $oldId;
		$insertRow = $conexao->query($sql);

		if($insertRow){
			header("Location: list.php?message=Grupo alterado com sucesso");
		}else {
			header("Location: edit.php?id=" . $oldId . "&message=Falha ao alterar Grupo: " . $conexao->errno .") ". $conexao->error);
		}
	}

	static function findNameById($id, $conexao){
		$sql = "select nome from album where idalbum = ". $id;
		$obj = $conexao->query($sql);
		$albumLazy =  $obj->fetch_object();
		if($albumLazy){
			$nome = $albumLazy->nome;
			return $nome;
		}else {
			header("Location: list.php?message=Grupo não encontrado");
		}
	}
}
?>