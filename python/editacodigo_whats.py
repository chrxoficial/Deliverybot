from selenium import webdriver #pip install selenium
from selenium.webdriver.common.keys import Keys #pip install selenium
from selenium.webdriver.common.by import By #pip install by
from selenium.webdriver.chrome.options import Options #pip install options
from selenium.webdriver.common.action_chains import ActionChains #pip install selenium
from webdriver_manager.chrome import ChromeDriverManager #pip install selenium
import urllib.request #pip install urllib3
import os #pip install os-sys
import time #pip install time
import requests ##pip install selenium
from selenium.webdriver.support.ui import WebDriverWait #pip install selenium
from selenium.webdriver.support import expected_conditions as EC #pip install selenium
import clipboard #pip install clipboard



def obter_configuracoes_whatsapp(chave):
    agent = {"User-Agent": 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'}
    api = requests.get(f"https://editacodigo.com.br/index/api-whatsapp/{chave}", headers=agent)
    time.sleep(1)
    api = api.text
    api = api.split(".n.")
    bolinha_notificacao = api[3].strip()
    contato_cliente = api[4].strip()
    caixa_msg = api[7].strip()
    msg_cliente = api[6].strip()
    caixa_de_pesquisa = api[8].strip()
    pega_contato = api[9].strip()
    return (bolinha_notificacao, contato_cliente, caixa_msg, msg_cliente,caixa_de_pesquisa,pega_contato)



def carregar_pagina_whatsapp(session_directory,site):

    chrome_options = Options()
    dir_path = os.getcwd()
    chrome_options.add_argument("user-data-dir=" + os.path.abspath(session_directory))
    driver = webdriver.Chrome(ChromeDriverManager().install(),options=chrome_options)
    driver.get(site)
    return driver

    #driver = editacodigo_whats.carregar_pagina_whatsapp("caminho/para/a/pasta/sessao")



#NOTIFACAÇÃO

def abrir_notificacao(driver,bolinha_notificacao,pega_contato,contato_cliente,msg_cliente,usuario,pagina):

    bolinha = driver.find_element(By.CLASS_NAME,bolinha_notificacao)
    bolinha = driver.find_elements(By.CLASS_NAME,bolinha_notificacao)
    clica_bolinha = bolinha[-1]
    bolinha_qt = clica_bolinha.text
    acao_bolinha = webdriver.common.action_chains.ActionChains(driver)
    acao_bolinha.move_to_element_with_offset(clica_bolinha,0,-20)
    acao_bolinha.click()
    acao_bolinha.perform()
    acao_bolinha.click()
    acao_bolinha.perform()
    return bolinha_qt
    print('tepa1')
    print(bolinha_qt)



def pega_contato(driver,contato_cliente):

    telefone_cliente = driver.find_element(By.XPATH,contato_cliente)
    telefone_final = telefone_cliente.text
    print(telefone_final)
    return telefone_final
    
    

    #telefone_cliente = driver.find_element(By.CSS_SELECTOR, pega_contato)
    #telefone_final = telefone_cliente.text
    
    #print(telefone_final)
    #return telefone_final    


    ###########PEGA MENSAGEM
def envia_as_msg_para_servidor(driver,msg_cliente,telefone_final,usuario,pagina):
    todas_as_mensagens = driver.find_elements(By.CLASS_NAME, msg_cliente)
    todas_as_mensagens_texto = [mensagem.text for mensagem in todas_as_mensagens]
    mensagem = todas_as_mensagens_texto[-1]    
    print(mensagem)
    
   
    ###########ENVIA PRO SERVIDOR
    agent = {"User-Agent": 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'}
    resposta = requests.get(pagina, params={'msg': mensagem, 'telefone': telefone_final, 'usuario': usuario},headers=agent)
    
    webdriver.ActionChains(driver).send_keys(Keys.ESCAPE).perform()
    


def enviar_msg_do_servidor(driver, servidor_enviar,usuario,caixa_de_pesquisa,caixa_msg,servidor_confirmar):
    agent = {"User-Agent": 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36'}
    api = requests.get(servidor_enviar,  params={'usuario': usuario}, headers=agent)
    time.sleep(1)
    api = api.text
    print(api)
    api = api.split(".n.")
    enviando = api[0].strip()
    print(enviando)
    id_enviar = api[1].strip()
    contato_enviar = api[2].strip()
    mensagem_enviar = api[3].strip()

    if enviando == "enviando":


  

        caixa_de_pesquisa = driver.find_element(By.CSS_SELECTOR, caixa_de_pesquisa)
        caixa_de_pesquisa.send_keys(contato_enviar)
        caixa_de_pesquisa.send_keys(Keys.ENTER)
 

        ####CAIXA DE MENSAGEM
        message_box =  driver.find_element(By.CSS_SELECTOR, caixa_msg)
        clipboard.copy(mensagem_enviar)
        message_box.send_keys(Keys.CONTROL, "v")
        message_box.send_keys(Keys.ENTER)
        webdriver.ActionChains(driver).send_keys(Keys.ESCAPE).perform()
        requests.get(servidor_confirmar,  params={'id': id_enviar}, headers=agent)
        
    #return (contato_enviar, mensagem_enviar,id_enviar)    
