TYPE=VIEW
query=select `p`.`codigo` AS `codigo`,`p`.`id_cliente` AS `id_cliente`,`c`.`nome` AS `cliente_nome`,`c`.`nif` AS `nif`,`c`.`contactos` AS `contactos`,`p`.`id_servico` AS `id_servico`,`s`.`tipo_servico` AS `tipo_servico`,`s`.`descricao` AS `descricao`,`s`.`categoria` AS `dept`,`s`.`tempo` AS `duracao`,`p`.`desconto` AS `desconto`,`p`.`valor_pago` AS `valor_pago`,`p`.`id_estado` AS `id_estado`,`estado`.`estado` AS `estado`,`p`.`data_inicio` AS `data_inicio`,`p`.`data_fim` AS `data_fim` from (((`db_ehma_oficial`.`tb_projectos` `p` join `db_ehma_oficial`.`tb_clientes` `c` on((`p`.`id_cliente` = `c`.`codigo`))) join `db_ehma_oficial`.`mostrar_servicos` `s` on((`p`.`id_servico` = `s`.`codigo`))) join `db_ehma_oficial`.`tb_estado_projectos` `estado` on((`p`.`id_estado` = `estado`.`id_estado`)))
md5=49e1f1bb34076d53720a4e38faab2d0f
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 19:19:00
create-version=2
source=select `p`.`codigo` AS `codigo`,`p`.`id_cliente` AS `id_cliente`,`c`.`nome` AS `cliente_nome`,`c`.`nif` AS `nif`,`c`.`contactos` AS `contactos`,`p`.`id_servico` AS `id_servico`,`s`.`tipo_servico` AS `tipo_servico`,`s`.`descricao` AS `descricao`,`s`.`categoria` AS `dept`,s.tempo as duracao,`p`.`desconto` AS `desconto`,`p`.`valor_pago` AS `valor_pago`,`p`.`id_estado` AS `id_estado`,`estado`.`estado` AS `estado`,`p`.`data_inicio` AS `data_inicio`,`p`.`data_fim` AS `data_fim` from (((`db_ehma_oficial`.`tb_projectos` `p` join `db_ehma_oficial`.`tb_clientes` `c` on((`p`.`id_cliente` = `c`.`codigo`))) join `db_ehma_oficial`.`mostrar_servicos` `s` on((`p`.`id_servico` = `s`.`codigo`))) join `db_ehma_oficial`.`tb_estado_projectos` `estado` on((`p`.`id_estado` = `estado`.`id_estado`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `p`.`codigo` AS `codigo`,`p`.`id_cliente` AS `id_cliente`,`c`.`nome` AS `cliente_nome`,`c`.`nif` AS `nif`,`c`.`contactos` AS `contactos`,`p`.`id_servico` AS `id_servico`,`s`.`tipo_servico` AS `tipo_servico`,`s`.`descricao` AS `descricao`,`s`.`categoria` AS `dept`,`s`.`tempo` AS `duracao`,`p`.`desconto` AS `desconto`,`p`.`valor_pago` AS `valor_pago`,`p`.`id_estado` AS `id_estado`,`estado`.`estado` AS `estado`,`p`.`data_inicio` AS `data_inicio`,`p`.`data_fim` AS `data_fim` from (((`db_ehma_oficial`.`tb_projectos` `p` join `db_ehma_oficial`.`tb_clientes` `c` on((`p`.`id_cliente` = `c`.`codigo`))) join `db_ehma_oficial`.`mostrar_servicos` `s` on((`p`.`id_servico` = `s`.`codigo`))) join `db_ehma_oficial`.`tb_estado_projectos` `estado` on((`p`.`id_estado` = `estado`.`id_estado`)))
mariadb-version=100130
