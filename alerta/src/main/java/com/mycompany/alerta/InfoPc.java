/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.alerta;

/**
 *
 * @author pssimeao
 */
public class InfoPc {
    public long memDisponivel;
    public long memTotal;
    
    public Boolean isCheia(long _memTotal, long _memDisponivel){
        memDisponivel = _memDisponivel;
        memTotal = _memTotal;
        
        //conta para pegar o limite que quiser definir
        //alterar se achar necessário
        double limite = memTotal * 0.25;
        
        System.out.println(limite);
        System.out.println(memTotal - memDisponivel);
        return memTotal - memDisponivel > limite;
    }
}
