package com.brickup.brickup.service;

import java.util.List;
import com.brickup.brickup.entity.tarefas;
import com.brickup.brickup.repository.tarefasRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class tarefasService {
    @Autowired
    private tarefasRepository repository;

    public tarefas saveTarefa(tarefas tarefa){
        return repository.save(tarefa);
    }

    public List<tarefas> saveTarefas(List<tarefas> tarefas){
        return repository.saveAll(tarefas);
    }

    public List<tarefas> getTarefas(){
        return repository.findAll();
    }

    public tarefas getTarefaById(int id){
        return repository.findById(id).orElse(null);
    }

    public List<tarefas> getTarefasByStatus(int status){
        return repository.findByStatus(status);
    }

    public String deleteTarefa(int id){
        repository.deleteById(id);
        return "tarefa removida! id:"+id;
    }

    public tarefas updateTarefa(tarefas tarefa){
        tarefas existingTarefas = repository.findById(tarefa.getId()).orElse(null);
        existingTarefas.setTitulo(tarefa.getTitulo());
        return repository.save(existingTarefas);
    }


}
