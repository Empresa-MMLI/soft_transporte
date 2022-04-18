TYPE=VIEW
query=select `faturas`.`codigo` AS `codigo`,`faturas`.`cliente` AS `cliente`,`faturas`.`nif` AS `nif`,`faturas`.`telefone` AS `telefone`,`faturas`.`id_servico` AS `id_servico`,`service`.`tipo_servico` AS `tipo_servico`,`service`.`descricao` AS `descricao`,`faturas`.`qtd` AS `qtd`,`faturas`.`preco` AS `preco`,`faturas`.`total` AS `total`,`faturas`.`desconto` AS `desconto`,`faturas`.`data_fatura` AS `data_fatura` from (`db_ehma_oficial`.`tb_faturas` `faturas` join `db_ehma_oficial`.`tb_servicos` `service` on((`faturas`.`id_servico` = `service`.`codigo`)))
md5=808facca5404938d22691aae719536a9
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 05:33:54
create-version=2
source=select `faturas`.`codigo` AS `codigo`,`faturas`.`cliente` AS `cliente`,`faturas`.`nif` AS `nif`,`faturas`.`telefone` AS `telefone`,`faturas`.`id_servico` AS `id_servico`,`service`.`tipo_servico` AS `tipo_servico`,`service`.`descricao` AS `descricao`,`faturas`.`qtd` AS `qtd`,`faturas`.`preco` AS `preco`,`faturas`.`total` AS `total`,`faturas`.`desconto` AS `desconto`,`faturas`.`data_fatura` AS `data_fatura` from (`tb_faturas` `faturas` join `tb_servicos` `service` on((`faturas`.`id_servico` = `service`.`codigo`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `faturas`.`codigo` AS `codigo`,`faturas`.`cliente` AS `cliente`,`faturas`.`nif` AS `nif`,`faturas`.`telefone` AS `telefone`,`faturas`.`id_servico` AS `id_servico`,`service`.`tipo_servico` AS `tipo_servico`,`service`.`descricao` AS `descricao`,`faturas`.`qtd` AS `qtd`,`faturas`.`preco` AS `preco`,`faturas`.`total` AS `total`,`faturas`.`desconto` AS `desconto`,`faturas`.`data_fatura` AS `data_fatura` from (`db_ehma_oficial`.`tb_faturas` `faturas` join `db_ehma_oficial`.`tb_servicos` `service` on((`faturas`.`id_servico` = `service`.`codigo`)))
mariadb-version=100130
