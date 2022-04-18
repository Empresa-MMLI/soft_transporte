TYPE=VIEW
query=select `salario`.`codigo` AS `codigo`,`salario`.`id_funcionario` AS `id_funcionario`,`funcionario`.`nome` AS `nome_funcionario`,`funcionario`.`dept` AS `departamento`,`funcionario`.`funcao` AS `funcao`,`funcionario`.`salario_base` AS `salario_base`,`funcionario`.`nif` AS `nif`,`funcionario`.`data_inicio` AS `data_inicio`,`salario`.`sub_alimentacao` AS `sub_alimentacao`,`salario`.`sub_transporte` AS `sub_transporte`,`salario`.`abonos` AS `abonos`,`salario`.`faltas` AS `faltas`,`salario`.`inss_3` AS `inss_3`,`salario`.`inss_8` AS `inss_8`,`salario`.`irt` AS `irt`,`salario`.`saldo` AS `saldo`,`salario`.`data_salario` AS `data_salario` from (`db_ehma_oficial`.`tb_salarios` `salario` join `db_ehma_oficial`.`mostrar_funcionarios` `funcionario` on((`salario`.`id_funcionario` = `funcionario`.`codigo`))) where ((month(`salario`.`data_salario`) = month(curdate())) and (year(`salario`.`data_salario`) = year(curdate())))
md5=e33535e85b593a8634a4ea8e332bc5b7
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 05:33:56
create-version=2
source=select `salario`.`codigo` AS `codigo`,`salario`.`id_funcionario` AS `id_funcionario`,`funcionario`.`nome` AS `nome_funcionario`,`funcionario`.`dept` AS `departamento`,`funcionario`.`funcao` AS `funcao`,`funcionario`.`salario_base` AS `salario_base`,`funcionario`.`nif` AS `nif`,`funcionario`.`data_inicio` AS `data_inicio`,`salario`.`sub_alimentacao` AS `sub_alimentacao`,`salario`.`sub_transporte` AS `sub_transporte`,`salario`.`abonos` AS `abonos`,`salario`.`faltas` AS `faltas`,`salario`.`inss_3` AS `inss_3`,`salario`.`inss_8` AS `inss_8`,`salario`.`irt` AS `irt`,`salario`.`saldo` AS `saldo`,`salario`.`data_salario` AS `data_salario` from (`tb_salarios` `salario` join `mostrar_funcionarios` `funcionario` on((`salario`.`id_funcionario` = `funcionario`.`codigo`))) where ((month(`salario`.`data_salario`) = month(curdate())) and (year(`salario`.`data_salario`) = year(curdate())))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `salario`.`codigo` AS `codigo`,`salario`.`id_funcionario` AS `id_funcionario`,`funcionario`.`nome` AS `nome_funcionario`,`funcionario`.`dept` AS `departamento`,`funcionario`.`funcao` AS `funcao`,`funcionario`.`salario_base` AS `salario_base`,`funcionario`.`nif` AS `nif`,`funcionario`.`data_inicio` AS `data_inicio`,`salario`.`sub_alimentacao` AS `sub_alimentacao`,`salario`.`sub_transporte` AS `sub_transporte`,`salario`.`abonos` AS `abonos`,`salario`.`faltas` AS `faltas`,`salario`.`inss_3` AS `inss_3`,`salario`.`inss_8` AS `inss_8`,`salario`.`irt` AS `irt`,`salario`.`saldo` AS `saldo`,`salario`.`data_salario` AS `data_salario` from (`db_ehma_oficial`.`tb_salarios` `salario` join `db_ehma_oficial`.`mostrar_funcionarios` `funcionario` on((`salario`.`id_funcionario` = `funcionario`.`codigo`))) where ((month(`salario`.`data_salario`) = month(curdate())) and (year(`salario`.`data_salario`) = year(curdate())))
mariadb-version=100130
