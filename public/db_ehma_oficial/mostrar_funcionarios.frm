TYPE=VIEW
query=select `db_ehma_oficial`.`tb_funcionarios`.`codigo` AS `codigo`,`db_ehma_oficial`.`tb_funcionarios`.`nome` AS `nome`,`db_ehma_oficial`.`tb_funcionarios`.`nif` AS `nif`,`db_ehma_oficial`.`tb_funcionarios`.`contactos` AS `contactos`,`db_ehma_oficial`.`tb_funcionarios`.`endereco` AS `endereco`,`db_ehma_oficial`.`tb_funcionarios`.`id_dept` AS `id_dept`,`dept`.`departamento` AS `dept`,`db_ehma_oficial`.`tb_funcionarios`.`id_especialidade` AS `id_especialidade`,`funcao`.`especialidade` AS `funcao`,`db_ehma_oficial`.`tb_funcionarios`.`salario_base` AS `salario_base`,`db_ehma_oficial`.`tb_funcionarios`.`data_inicio` AS `data_inicio` from ((`db_ehma_oficial`.`tb_funcionarios` join `db_ehma_oficial`.`tb_departamentos` `dept` on((`db_ehma_oficial`.`tb_funcionarios`.`id_dept` = `dept`.`id_dept`))) join `db_ehma_oficial`.`tb_especialidade` `funcao` on((`funcao`.`id_especialidade` = `db_ehma_oficial`.`tb_funcionarios`.`id_especialidade`)))
md5=2e588cad7f1cbd945439695ca7ba62be
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 05:33:55
create-version=2
source=select `tb_funcionarios`.`codigo` AS `codigo`,`tb_funcionarios`.`nome` AS `nome`,`tb_funcionarios`.`nif` AS `nif`,`tb_funcionarios`.`contactos` AS `contactos`,`tb_funcionarios`.`endereco` AS `endereco`,`tb_funcionarios`.`id_dept` AS `id_dept`,`dept`.`departamento` AS `dept`,`tb_funcionarios`.`id_especialidade` AS `id_especialidade`,`funcao`.`especialidade` AS `funcao`,`tb_funcionarios`.`salario_base` AS `salario_base`,`tb_funcionarios`.`data_inicio` AS `data_inicio` from ((`tb_funcionarios` join `tb_departamentos` `dept` on((`tb_funcionarios`.`id_dept` = `dept`.`id_dept`))) join `tb_especialidade` `funcao` on((`funcao`.`id_especialidade` = `tb_funcionarios`.`id_especialidade`)))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `db_ehma_oficial`.`tb_funcionarios`.`codigo` AS `codigo`,`db_ehma_oficial`.`tb_funcionarios`.`nome` AS `nome`,`db_ehma_oficial`.`tb_funcionarios`.`nif` AS `nif`,`db_ehma_oficial`.`tb_funcionarios`.`contactos` AS `contactos`,`db_ehma_oficial`.`tb_funcionarios`.`endereco` AS `endereco`,`db_ehma_oficial`.`tb_funcionarios`.`id_dept` AS `id_dept`,`dept`.`departamento` AS `dept`,`db_ehma_oficial`.`tb_funcionarios`.`id_especialidade` AS `id_especialidade`,`funcao`.`especialidade` AS `funcao`,`db_ehma_oficial`.`tb_funcionarios`.`salario_base` AS `salario_base`,`db_ehma_oficial`.`tb_funcionarios`.`data_inicio` AS `data_inicio` from ((`db_ehma_oficial`.`tb_funcionarios` join `db_ehma_oficial`.`tb_departamentos` `dept` on((`db_ehma_oficial`.`tb_funcionarios`.`id_dept` = `dept`.`id_dept`))) join `db_ehma_oficial`.`tb_especialidade` `funcao` on((`funcao`.`id_especialidade` = `db_ehma_oficial`.`tb_funcionarios`.`id_especialidade`)))
mariadb-version=100130
