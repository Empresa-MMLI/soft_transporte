TYPE=VIEW
query=select `db_ehma_oficial`.`tb_meu_banco`.`codigo` AS `codigo`,`db_ehma_oficial`.`tb_meu_banco`.`designacao` AS `designacao`,`db_ehma_oficial`.`tb_meu_banco`.`modelo_pagto` AS `modelo_pagto`,`db_ehma_oficial`.`tb_meu_banco`.`credito` AS `credito`,`db_ehma_oficial`.`tb_meu_banco`.`debito` AS `debito`,`db_ehma_oficial`.`tb_meu_banco`.`saldo` AS `valor`,`db_ehma_oficial`.`tb_meu_banco`.`data_entrada` AS `data_entrada` from `db_ehma_oficial`.`tb_meu_banco` where ((month(`db_ehma_oficial`.`tb_meu_banco`.`data_entrada`) = month(curdate())) and (year(`db_ehma_oficial`.`tb_meu_banco`.`data_entrada`) = year(curdate())))
md5=29226e46c16cb55c689c4fdadb09cd6e
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 05:33:55
create-version=2
source=select `tb_meu_banco`.`codigo` AS `codigo`,`tb_meu_banco`.`designacao` AS `designacao`,`tb_meu_banco`.`modelo_pagto` AS `modelo_pagto`,`tb_meu_banco`.`credito` AS `credito`,`tb_meu_banco`.`debito` AS `debito`,`tb_meu_banco`.`saldo` AS `valor`,`tb_meu_banco`.`data_entrada` AS `data_entrada` from `tb_meu_banco` where ((month(`tb_meu_banco`.`data_entrada`) = month(curdate())) and (year(`tb_meu_banco`.`data_entrada`) = year(curdate())))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `db_ehma_oficial`.`tb_meu_banco`.`codigo` AS `codigo`,`db_ehma_oficial`.`tb_meu_banco`.`designacao` AS `designacao`,`db_ehma_oficial`.`tb_meu_banco`.`modelo_pagto` AS `modelo_pagto`,`db_ehma_oficial`.`tb_meu_banco`.`credito` AS `credito`,`db_ehma_oficial`.`tb_meu_banco`.`debito` AS `debito`,`db_ehma_oficial`.`tb_meu_banco`.`saldo` AS `valor`,`db_ehma_oficial`.`tb_meu_banco`.`data_entrada` AS `data_entrada` from `db_ehma_oficial`.`tb_meu_banco` where ((month(`db_ehma_oficial`.`tb_meu_banco`.`data_entrada`) = month(curdate())) and (year(`db_ehma_oficial`.`tb_meu_banco`.`data_entrada`) = year(curdate())))
mariadb-version=100130
