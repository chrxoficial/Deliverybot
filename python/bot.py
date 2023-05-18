import editacodigo_whats
import time
import os

#PUXA AS CONFIGURAÇÕES INICIAIS
bolinha_notificacao, contato_cliente, caixa_msg, msg_cliente,caixa_de_pesquisa,pega_contato = editacodigo_whats.obter_configuracoes_whatsapp('ZHLkIgFnDSLITSYb71rcFdt3RoDU102o')

####CARREGAR NAVEGADOR
driver = editacodigo_whats.carregar_pagina_whatsapp('zap/sessao','https://web.whatsapp.com/')

########### VARIAVEIS #######

usuario = 'victor.nery.prof@gmail.com'

pagina = 'http://localhost/bot/api/recebe.php?'

servidor_enviar = 'http://localhost/bot/api/enviar.php?'

servidor_confirmar = 'http://localhost/bot/api/confirma.php?'
#############################################################################

while True:
    try:
        notificacao =  editacodigo_whats.abrir_notificacao(driver,bolinha_notificacao,pega_contato,contato_cliente,msg_cliente,usuario,pagina)
        time.sleep(1)
        telefone_final = editacodigo_whats.pega_contato(driver,contato_cliente)
        time.sleep(1)
        final = editacodigo_whats.envia_as_msg_para_servidor(driver,msg_cliente,telefone_final,usuario,pagina)
    except:
        try:
            envia = editacodigo_whats.enviar_msg_do_servidor(driver, servidor_enviar,usuario,caixa_de_pesquisa,caixa_msg,servidor_confirmar)
            print(envia)
        except:
            print('aguarde')    
        
       