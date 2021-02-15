package com.brickup.brickup.controller;

import java.util.List;

import com.brickup.brickup.entity.tarefas;
import com.brickup.brickup.service.tarefasService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class tarefasController {
    
    @Autowired
    private tarefasService service;

    @PostMapping("/addTarefa")
    public tarefas addTarefa(@RequestBody tarefas tarefa){
        return service.saveTarefa(tarefa);
    }

    @PostMapping("/addTarefas")
    public List<tarefas> addTarefas(@RequestBody List<tarefas> tarefas){
        return service.saveTarefas(tarefas);
    }

    @GetMapping("/tarefas")
    public List<tarefas> findAllTarefas(){
        return service.getTarefas();
    }

    @GetMapping("/tarefa/{id}")
    public tarefas findTarefaById(@PathVariable int id){
        return service.getTarefaById(id);
    }

    @GetMapping("/tarefas/{status}")
    public List<tarefas> findTarefaByStatus(@PathVariable int status){
        return service.getTarefasByStatus(status);
    }

    @PutMapping("/update")
    public tarefas updateTarefa(@RequestBody tarefas tarefa){
        return service.updateTarefa(tarefa);
    }

    @DeleteMapping("/delete/{id")
    public String deleteTarefa(@PathVariable int id){
        return service.deleteTarefa(id);
    }
}
