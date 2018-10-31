Monitoramento de filas do Asterisk com Zabbix
=============================================

### Instalação 

Baixe o repositório e copie os arquivos `queue_status_zab.php` e `queue_zab.sh` para dentro de `/usr/local/bin`

Após de permis


Em seguida verifique se a opção Include dentro do `zabbix_agentd.conf` está configurada

```
Include=/etc/zabbix/zabbix_agentd.d/
``` 

E copie o arquivo `userparameter_queue.conf` para dentro do diretorio. 

### TODO

* Criar template com informações dos items 
* Item de Discovery da filas