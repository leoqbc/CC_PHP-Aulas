<?php

/**
 * Criar um componente usando TDD que recebe uma string de documento de identificação
 * ex: new Document('333.333.333-22')
 * 
 * 1. Teste e crie um construtor para validar se o formato passado é valido para CPF ou CNPJ
 * 
 * 2. Teste e crie um método documentType() que deve retornar 'person' ( para CPF ) ou 'company' ( para CNPJ )
 * 
 * 3. Teste e crie um método chamado getUnmasked() que deve retornar o valor sem as pontuações
 * 
 * requisitos: 
 * 1. Usar pelo menos um DataProvider
 * 2. Testar pelo menos uma exceção
 */