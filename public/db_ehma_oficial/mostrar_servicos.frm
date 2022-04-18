TYPE=VIEW
query=select `service`.`codigo` AS `codigo`,`service`.`tipo_servico` AS `tipo_servico`,`service`.`descricao` AS `descricao`,`service`.`id_categoria` AS `id_categoria`,`dept`.`departamento` AS `categoria`,`service`.`supervisor` AS `id_supervisor`,`func`.`nome` AS `supervisor`,`service`.`preco` AS `preco`,`service`.`duracao` AS `tempo`,`service`.`medidas` AS `medidas` from ((`db_ehma_oficial`.`tb_servicos` `service` join `db_ehma_oficial`.`tb_departamentos` `dept` on((`dept`.`id_dept` = `service`.`id_categoria`))) left join `db_ehma_oficial`.`tb_funcionarios` `func` on((`func`.`codigo` = `service`.`supervisor`)))
md5=6905b49d79db49c19e257fd0715aeefa
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-24 18:50:14
create-version=2
source=select `service`.`codigo` AS `codigo`,`service`.`tipo_servico` AS `tipo_servico`,`service`.`descricao` AS `descricao`,`service`.`id_categoria` AS `id_categoria`,`dept`.`departamento` AS `categoria`,`service`.`supervisor` AS `id_supervisor`,`func`.`nome` AS `supervisor`,`service`.`preco` AS `preco`,`service`.`duracao` AS `tempo`,`service`.`medidas` AS `medidas` from ((`db_ehma_oficial`.`tb_servicos` `service` join `db_ehma_oficial`.`tb_departamentos` `dept` on((`dept`.`id_dept` = `service`.`id_categoria`))) left outer join `db_ehma_oficial`.`tb_funcionarios` `func` on((`func`.`codigo` = `service`.`supervisor`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `service`.`codigo` AS `codigo`,`service`.`tipo_servico` AS `tipo_servico`,`service`.`descricao` AS `descricao`,`service`.`id_categoria` AS `id_categoria`,`dept`.`departamento` AS `categoria`,`service`.`supervisor` AS `id_supervisor`,`func`.`nome` AS `supervisor`,`service`.`preco` AS `preco`,`service`.`duracao` AS `tempo`,`service`.`medidas` AS `medidas` from ((`db_ehma_oficial`.`tb_servicos` `service` join `db_ehma_oficial`.`tb_departamentos` `dept` on((`dept`.`id_dept` = `service`.`id_categoria`))) left join `db_ehma_oficial`.`tb_funcionarios` `func` on((`func`.`codigo` = `service`.`supervisor`)))
mariadb-version=100130
