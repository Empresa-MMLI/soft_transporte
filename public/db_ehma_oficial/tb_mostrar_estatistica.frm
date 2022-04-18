TYPE=VIEW
query=select dayofmonth(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) AS `dias`,sum(`db_ehma_oficial`.`tb_meu_caixa`.`entrada`) AS `total_e`,sum(`db_ehma_oficial`.`tb_meu_caixa`.`saida`) AS `total_s`,(sum(`db_ehma_oficial`.`tb_meu_caixa`.`entrada`) - sum(`db_ehma_oficial`.`tb_meu_caixa`.`saida`)) AS `total` from `db_ehma_oficial`.`tb_meu_caixa` where ((month(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = month(curdate())) and (year(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = year(curdate()))) group by `db_ehma_oficial`.`tb_meu_caixa`.`data_entrada` order by dayofmonth(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`)
md5=3fff0e92102064ec182deddadd12844f
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2021-04-20 05:33:56
create-version=2
source=select dayofmonth(`tb_meu_caixa`.`data_entrada`) AS `dias`,sum(`tb_meu_caixa`.`entrada`) AS `total_e`,sum(`tb_meu_caixa`.`saida`) AS `total_s`,(sum(`tb_meu_caixa`.`entrada`) - sum(`tb_meu_caixa`.`saida`)) AS `total` from `tb_meu_caixa` where ((month(`tb_meu_caixa`.`data_entrada`) = month(curdate())) and (year(`tb_meu_caixa`.`data_entrada`) = year(curdate()))) group by `tb_meu_caixa`.`data_entrada` order by dayofmonth(`tb_meu_caixa`.`data_entrada`)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select dayofmonth(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) AS `dias`,sum(`db_ehma_oficial`.`tb_meu_caixa`.`entrada`) AS `total_e`,sum(`db_ehma_oficial`.`tb_meu_caixa`.`saida`) AS `total_s`,(sum(`db_ehma_oficial`.`tb_meu_caixa`.`entrada`) - sum(`db_ehma_oficial`.`tb_meu_caixa`.`saida`)) AS `total` from `db_ehma_oficial`.`tb_meu_caixa` where ((month(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = month(curdate())) and (year(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`) = year(curdate()))) group by `db_ehma_oficial`.`tb_meu_caixa`.`data_entrada` order by dayofmonth(`db_ehma_oficial`.`tb_meu_caixa`.`data_entrada`)
mariadb-version=100130
