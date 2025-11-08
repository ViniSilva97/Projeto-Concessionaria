<?php
	switch($_REQUEST['acao']) {
		case 'cadastrar':
		$nome = $_POST['nome_marca'];
		$email = $_POST['email_marca'];
		$telefone = $_POST['telefone_marca'];

		$sql = "INSERT INTO marca (nome_marca, email_marca, telefone_marca)
			VALUES ('{$nome}', '{$email}', '{$telefone}')";
			

		$res = $conn->query($sql);

		if($res == true){
			print "<script>alert('Cadastrado com Sucesso!');</script>";
			print "<script>location.href='?page=listar-marca';</script>";
		}else{
			print "<script>alert('Não cadastrado);</script>";
			print "<script>location.href='?page=listar-marca';</script>";

		}
		break;
	}