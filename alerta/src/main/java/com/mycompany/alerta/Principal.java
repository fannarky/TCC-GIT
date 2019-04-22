
package com.mycompany.alerta;

import java.net.InetAddress;
import java.util.Arrays;
import java.util.Scanner;
import javax.swing.JOptionPane;
import oshi.SystemInfo;
import oshi.hardware.HWDiskStore;
import oshi.hardware.HardwareAbstractionLayer;

public class Principal {
    public static void main(String[] args) throws InterruptedException{
        SystemInfo sis = new SystemInfo();
        InfoPc info = new InfoPc();
        //sis.getOperatingSystem();
        
        
        //HardwareAbstractionLayer hal = sis.getHardware();
        
        
        //HWDiskStore disk[] = hal.getDiskStores();
        
        //System.out.println(Arrays.toString(disk));

        //sis.getHardware().getFileSystem().getFileStores().length;
        //sis.getHardware().getFileSystem().getFileStores()[i].getLogicalVolume();
        //sis.getHardware().getFileSystem().getFileStores()[i].getName();
        //System.out.println(sis.getHardware().getDiskStores());

        //sis.getHardware().getComputerSystem().getModel();

        //System.out.println(System.getProperty("user.name"));

        //InetAddress.getLocalHost().getHostName();

        //InetAddress.getLocalHost().getAddress();

        
        
        System.out.println(sis.getHardware().getMemory().getTotal());
        System.out.println(sis.getHardware().getMemory().getAvailable());
        
        Thread alertaMemoria = new Thread(){
            @Override
            public void run() {
                String resposta = null;
                
                while(true){
                    System.out.println(sis.getHardware().getMemory().getTotal());
                    System.out.println(sis.getHardware().getMemory().getAvailable());
                    resposta = info.isCheia(sis.getHardware().getMemory().getTotal(), sis.getHardware().getMemory().getAvailable()) ? "Alerta: memória entrando no limite" : null;
                    System.out.println(resposta);
                    if(resposta != null){
                        String input = null;
                        do{
                            input = JOptionPane.showInputDialog("Alerta: memória chegando no limite, Digite OK para parar com os alertas");
                            System.out.println(input.toLowerCase()); 
                        }while(!input.toLowerCase().equals("ok"));
                        break;
                    }
                }
                        
                
            }
          
        };
        
        //String resposta = info.isCheia(sis.getHardware().getMemory().getTotal(), sis.getHardware().getMemory().getAvailable()) ? "Alerta: memória entrando no limite" : null;
        
        //alertaMemoria.start();
        
        System.out.println(info.isCheiaInt(sis.getHardware().getMemory().getTotal(), sis.getHardware().getMemory().getAvailable()));
        
        
    }
    

}
