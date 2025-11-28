<h1>Listar Venda</h1>

<?php
$sql = "
    SELECT 
        v.id_venda,
        v.data_venda,
        v.valor_venda,
        m.nome_modelo,
        f.nome_funcionario,
        c.nome_cliente
    FROM venda v
    INNER JOIN modelo m ON v.modelo_id_modelo = m.id_modelo
    INNER JOIN funcionario f ON v.funcionario_id_funcionario = f.id_funcionario
    INNER JOIN cliente c ON v.cliente_id_cliente = c.id_cliente
";

	$res = $conn->query($sql);
	$qtd = $res->num_rows;

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> venda(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Data</th>";
    print "<th>Valor</th>";
    print "<th>Modelo</th>";
    print "<th>Funcionário</th>";
    print "<th>Cliente</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_venda}</td>";
        $data_do_banco = $row->data_venda;
        $data_formatada = date('d/m/Y', strtotime($data_do_banco));
        print "<td>" . $data_formatada . "</td>";
        print "<td>R$ {$row->valor_venda}</td>";
        print "<td>{$row->nome_modelo}</td>";
        print "<td>{$row->nome_funcionario}</td>";
        print "<td>{$row->nome_cliente}</td>";
        print"<td>
                    <button class='btn btn-success' onclick=\"
                    location.href='?page=editar-venda&id_venda={$row->id_venda}';\">Editar</button>


                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';}else{false;}\">Excluir</button>
                    </td>"; 
    }

    print "</table>";
} else {
    print "<p> Nenhuma venda encontrada.</p>";
}
?>