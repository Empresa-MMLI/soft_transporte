TYPE=VIEW
query=select `db_ehma_oficial`.`tb_meu_caixa`.`codigo` AS `codigo`,`db_ehma_oficial`.`tb_meu_caixa`.`designacao` AS `designacao`,`db_ehma_oficial`.`tb_meu_caixa`.`modelo_pagto` AS `modelo_pagto`,`db_ehma_oficial`.`tb_meu_caixa`.`entrada` AS `entrada`,`db_ehma_oficial`.`tb_meu_caixa`.`saida` AS `saida`,`db_ehma_oficial`.`tb_meu_caixa`.`valor` AS `valor`,`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada` AS `data_entrada` from `db_ehma_oficial`.`tb_meu_caixa` where ((month(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = month(curdate())) and (year(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = year(curdate())))
md5=a17f8239c3d8d67b9a6a01a470114508
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 05:33:55
create-version=2
source=select `tb_meu_caixa`.`codigo` AS `codigo`,`tb_meu_caixa`.`designacao` AS `designacao`,`tb_meu_caixa`.`modelo_pagto` AS `modelo_pagto`,`tb_meu_caixa`.`entrada` AS `entrada`,`tb_meu_caixa`.`saida` AS `saida`,`tb_meu_caixa`.`valor` AS `valor`,`tb_meu_caixa`.`data_entrada` AS `data_entrada` from `tb_meu_caixa` where ((month(`tb_meu_caixa`.`data_entrada`) = month(curdate())) and (year(`tb_meu_caixa`.`data_entrada`) = year(curdate())))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `db_ehma_oficial`.`tb_meu_caixa`.`codigo` AS `codigo`,`db_ehma_oficial`.`tb_meu_caixa`.`designacao` AS `designacao`,`db_ehma_oficial`.`tb_meu_caixa`.`modelo_pagto` AS `modelo_pagto`,`db_ehma_oficial`.`tb_meu_caixa`.`entrada` AS `entrada`,`db_ehma_oficial`.`tb_meu_caixa`.`saida` AS `saida`,`db_ehma_oficial`.`tb_meu_caixa`.`valor` AS `valor`,`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada` AS `data_entrada` from `db_ehma_oficial`.`tb_meu_caixa` where ((month(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = month(curdate())) and (year(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = year(curdate())))
mariadb-version=100130
